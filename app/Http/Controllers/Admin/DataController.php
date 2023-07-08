<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataRequest;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\DataUser;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


class DataController extends Controller
{

    public function create()
    {
        $data = Data::all(); // Ambil semua data user

        return view('admin.data.create', compact('data'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Data $data)
    {
        $query = Data::latest()->orderBy('created_at');

        if(request('search')){
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        $datas = $query->paginate(5);

        return view('admin.data.index', compact('datas'));
    }

        public function export($type = 'excel')
    {
        // Generate File Excel & Pdf
        if ($type == 'excel') {
            return Excel::download(new DataExport(), 'Data.xlsx');
        } elseif ($type == 'pdf') {
            return Excel::download(new DataExport(), 'Data.pdf');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Data $data, DataRequest $request)
    {
        $validated = $request->validated();
        // Insert data ke model Data
        $data = new Data;
        $data->name = $request->name;
        $data->save();

        if ($data->save() == true) {
            // Data berhasil disimpan (true)
            notify()->success('Berhasil menambahkan Data baru', 'Operation Success');
        } else {
            // Data gagal disimpan (false)
            notify()->error('Gagal menambahkan Data baru', 'Operation Failed');
        }

        // Mendapatkan ID data yang baru saja diinsert
        $dataId = $data->id;

        return redirect()->to('/admin/dataUser/' . $dataId . '/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $datas = Data::all();
        $data = Data::findOrFail($id);
        $users = User::where('role_id', 2)->paginate(7);
        $selectedUsers = DataUser::where('data_id', $id)->pluck('user_id')->toArray();
        return view('admin.data.edit', compact('datas', 'data', 'users', 'selectedUsers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, DataRequest $request, Data $data)
    {
        // Temukan data yang akan diubah
        $data = $data->find($id);
        $datas = Data::findOrFail($id);

        // Ubah data dan redirect sesuai kondisi berhasil atau gagal
        if ($data->update($request->validated())) {
            // Berhasil
            notify()->success('Data Berhasil Diubah', 'Operation Success');
            return redirect()->back();
        } else {
            // Gagal
            notify()->error('Data Gagal Diubah', 'Operation Failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Data $data)
    {
        //
        $data = $data->find($id);

        // Hapus data dan redirect sesuai kondisi berhasil atau gagal
        if ($data->delete()) {
            // Berhasil
            notify()->success('Data Berhasil Dihapus', 'Operation Success');
            return redirect()->to('/admin/data');
        } else {
            // Gagal
            notify()->error('Data Gagal Dihapus', 'Operation Failed');
            return redirect()->to('/admin/data');
        }
    }
}
