<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Roles;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\AttendanceUser;
use App\Models\DataUser;
use App\Models\Permit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected $defaultAvatar = "default.png";
    protected $defaultPathAvatar = 'public/img/avatar/';

    public function index(Request $request)
    {
        $q = $request->q;

        $users = User::where(function ($query) use ($q) {
            if ($q) {
                $query->search($q);
            }
        })->latest()->paginate(5)->withQueryString();

        return view('admin.user.index', compact('users', 'q'));
    }

    public function create(Request $request)
    {
        $roles = Roles::orderBy('name')->get();

        return view('admin.user.create', compact('roles'));
    }



    public function store(UserRequest $request)
    {

        // Validation
        $request->validated();

        // Generate NIP
        $nip = mt_rand();

        // Check NIP jika generate kurang dari 10
        if (Str::length($nip) != 10) {
            $nip = mt_rand();
        }

        /**
         * Generate foto File Name
         * Ex: 1234567890_username.jpg
         */
        if ($request->hasFile('foto')) {
            $userFotoName = $nip . '_' . $request->username . '.' . $request->foto->extension();
        } else {
            $userFotoName = $this->defaultAvatar;
        }

        $createUser = User::create([
            'name'      =>  $request->name,
            'username'  =>  $request->username,
            'nip'       =>  $nip,
            'email'     =>  $request->email,
            'password'  =>  $request->password,
            'avatar'    =>  $userFotoName,
        ]);


        if ($createUser == true) {
            if ($request->hasFile('foto')) {
                Storage::putFileAs($this->defaultPathAvatar, $request->file('foto'), $userFotoName);
            }
            notify()->success('Pengguna berhasil disimpan.');
        } else {
            notify()->error('Terjadi kesalahan saat menyimpan pengguna.');
        }


        return redirect()->to('/admin/users');
    }

    public function edit(string $nip)
    {
        $roles = Roles::orderBy('name')->get();
        $user = User::where('nip', $nip)->firstOrFail();
        return view('admin.user.edit', compact('roles', 'user'));
    }

    public function update(UserRequest $request, User $user, $nip)
    {
        $user = $user::where('nip', $nip)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ]
        ]);


        // Jika file baru diupload, gunakan file gambar baru tsb
        if ($request->hasFile('foto')) {
            $userFotoName = $nip . '_' . $request->username . '.' . $request->foto->extension();
            // $userAvatar = $user->avatar;
        }

        $userAvatarName = $userFotoName ?? $user->avatar;

        $updateUser = User::find($user->id);

        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->role_id = $request->role;
        $updateUser->avatar = $userAvatarName;

        if ($updateUser->save() == true) {
            if ($request->hasFile('foto')) {
                Storage::putFileAs($this->defaultPathAvatar, $request->file('foto'), $userAvatarName);
                Storage::delete($this->defaultPathAvatar . $user->avatar);
            }
            // unlink('storage/img/avatar/' . $user->avatar);
            notify()->success('Perubahan Berhasil disimpan.');
        } else {
            notify()->error('Terjadi kesalahan saat menyimpan pengguna.');
        }

        // notify()->success('User berhasil disimpan!');
        return redirect()->to('/admin/users');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);

        // Check jika user tidak menggunakan avatar default
        if ($user->avatar != $this->defaultAvatar) {
            Storage::delete('public/img/avatar/' . $user->avatar);
        }

        // Hapus Relasi User
        DataUser::where('user_id', $userId)->delete();
        AttendanceUser::where('user_id', $userId)->delete();
        Permit::where('user_id', $userId)->delete();

        // Hapus user
        if ($user->delete()) {
            notify()->success('Pengguna berhasil dihapus.');
        } else {
            notify()->error('Terjadi kesalahan saat menghapus pengguna.');
        }

        return redirect()->back();
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'mimes:xls,xlsx|max:5012'
        ], [
            'file.mimes' => 'Format file salah',
            'file.max' => 'Ukuran file terlalu besar'
        ]);

        try {
            Excel::import(new UsersImport, $request->file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $field = $failure->values()[$failure->attribute()];

                return $failure->errors()[0] . " (" . $field . ")";
                // return $field;
                // $failure->row(); // row that went wrong
                // $failure->attribute(); // either heading key (if using heading row concern) or column index
                // $failure->errors(); // Actual error messages from Laravel validator
                // $failure->values(); // The values of the row that has failed.
            }
        }

        notify()->success('User berhasil disimpan!');

        return redirect()->route('users.index');
    }

    public function export($type)
    {
        if ($type == "excel") {
            return $this->exportExcel();
        } else {
            return $this->exportPdf();
        }
    }

    public function show($nip)
    {
        $user = User::where('nip', $nip)->first();
        return view('admin.user.show', compact('user'));
    }

    private function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    private function exportPdf()
    {
        $users = User::all();

        $pdf = Pdf::loadView('exports.users', [
            'users' => $users
        ]);

        return $pdf->download('users.pdf');
    }
}
