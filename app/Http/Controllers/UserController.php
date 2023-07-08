<?php

namespace App\Http\Controllers;

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

class UserController extends Controller
{
    public function create(Request $request)
    {
        // // Validate the request data
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'username' => 'required|unique:users',
        //     'nip' => 'required|size:10|unique:users',
        //     'email' => 'required|email|unique:users',
        //     'role' => 'required|in:admin,member',
        //     'password' => 'required|string',
        //     'avatar' => 'required|string',
        // ]);

        // // Create a new user
        // $user = User::create($validatedData);

        // // Optionally, you can redirect to a success page or show a success message
        // return redirect()->back()->withSuccess('User created successfully!');

        $roles = Roles::orderBy('name')->get();

        return view('admin.user.create', compact('roles'));
    }

    public function index(Request $request)
    {
        $q = $request->q;

        $users = User::where(function($query) use($q) {
            if($q) {
                $query->search($q);
            }
        })->latest()->paginate(5)->withQueryString();

        return view('admin.user.index', compact('users', 'q'));
    }

    public function store(UserRequest $request)
    {
        $path = "default.png";

        if($request->avatar) {
            $avatar = $request->avatar;
            $avatar_name = uniqid().'.'.$avatar->getClientOriginalExtension();
    
            Storage::disk('public')->putFileAs('img/avatar', $avatar, $avatar_name);
    
            $path = Storage::disk('public')->url('img/avatar/'.$avatar_name);
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'nip' => $request->nip,
            'email' => $request->email,
            'role' => $request->role_id == '1' ? 'admin' : 'member',
            'password' => bcrypt($request->password),
            'avatar' => $path,
            'role_id' => $request->role_id
        ]);

        notify()->success('User berhasil disimpan!');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Roles::orderBy('name')->get();

        return view('admin.user.edit', compact('roles', 'user'));
    }

    public function update(UserRequest $request, User $user)
    {
        DB::beginTransaction();

        $path = $user->avatar;

        if($request->avatar) {
            if($path != "default.png") {
                // delete old avatar
                $old_path = explode("/", $path)[6];
                $old_path = public_path('storage/img/avatar/'.$old_path);

                if(file_exists($old_path)) {
                    unlink($old_path);
                }
            }

            // update new avatar
            $avatar = $request->avatar;
            $avatar_name = uniqid().'.'.$avatar->getClientOriginalExtension();
    
            Storage::disk('public')->putFileAs('img/avatar', $avatar, $avatar_name);
    
            $path = Storage::disk('public')->url('img/avatar/'.$avatar_name);
        }

        try {
            if($request->password) {
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'nip' => $request->nip,
                'email' => $request->email,
                'role' => $request->role_id == '1' ? 'admin' : 'member',
                'avatar' => $path,
                'role_id' => $request->role_id
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            abort(500);
        }

        notify()->success('User berhasil disimpan!');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if($user->avatar != "default.png") {
            // delete old avatar
            $old_path = explode("/", $user->avatar)[6];
            $old_path = public_path('storage/img/avatar/'.$old_path);

            if(file_exists($old_path)) {
                unlink($old_path);
            }
        }

        $user->delete();

        notify()->success('User berhasil dihapus!');

        return redirect()->route('users.index');
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
                
                return $failure->errors()[0]." (".$field.")";
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
        if($type == "excel") {
            return $this->exportExcel();
        } else {
            return $this->exportPdf();
        }    
    }

    public function show(User $user)
    {
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
