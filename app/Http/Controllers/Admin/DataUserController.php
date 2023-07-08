<?php
namespace App\Http\Controllers\Admin;

use App\Exports\DataUserExport;
use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\DataUser;
use App\Models\User; 
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use Symfony\Component\VarDumper\Cloner\Data as ClonerData;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Mengambil data dan data_id dari tabel Data
        $data = Data::findOrFail($id);
        $dataId = $data->id;

        // Mengambil user_id yang berelasi dengan data_id pada tabel DataUser
        $users = User::whereIn('id', function ($query) use ($dataId) {
            $query->select('user_id')
                ->from('data_user')
                ->where('data_id', $dataId);
        })->get();

        // Mengirim data ke tampilan edit
        return view('admin.dataUser.index', compact('data', 'users'));
    }


    public function export($id, $type = 'excel')
    {
        // Mengambil data dan data_id dari tabel Data
        $data = Data::findOrFail($id);
        $dataId = $data->id;

        // Mengambil user_id yang berelasi dengan data_id pada tabel DataUser
        $users = User::whereIn('id', function ($query) use ($dataId) {
            $query->select('user_id')
                ->from('data_user')
                ->where('data_id', $dataId);
        })->get();



        // Generate File Excel & Pdf
        if ($type == 'excel') {
            return Excel::download(new DataUserExport($data, $users), 'Data User_' . $data->name . '.xlsx');
        } elseif ($type == 'pdf') {
            return Excel::download(new DataUserExport($data, $users), 'Data User_' . $data->name . '.pdf');
        }
    }
    

    public function create($dataId)
    {
        $data = Data::find($dataId);
        $users = User::where('role_id', 2)->paginate(7);

        $data_id_selected = $data;

    return view('admin.dataUser.create', compact('data', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data_id = $request->input('data_id');
        $user_ids = $request->input('user');

        if (!is_array($user_ids)) {
            $user_ids = []; 
        }

        foreach ($user_ids as $user_id) {
            $dataUser = new DataUser;
            $dataUser->data_id = $data_id;
            $dataUser->user_id = $user_id;
            $dataUser->save();
        }

    return redirect('/admin/data');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }


    public function edit($id)
    {
        //
        $data = Data::findOrFail($id);
        $users = User::where('role_id', 2)->get();
        $selectedUsers = DataUser::where('data_id', $id)->pluck('user_id')->toArray();

        return view('admin.dataUser.edit', compact('data', 'users', 'selectedUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $selectedUsers = $request->input('selected_users', []);


        DataUser::where('data_id', $id)->delete();


        foreach ($selectedUsers as $userId) {
            $dataUser = new DataUser();
            $dataUser->data_id = $id;
            $dataUser->user_id = $userId;
            $dataUser->save();
        }

        $data = Data::findOrFail($id);
        $dataId = $data->id;

        $users = User::whereIn('id', function ($query) use ($dataId) {
            $query->select('user_id')
                ->from('data_user')
                ->where('data_id', $dataId);
        })->get();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
