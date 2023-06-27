<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\DataUser;
use App\Models\User;

class DataController extends Controller
{

    public function create()
{
    $data = Data::all(); // Ambil semua data user

    return view('data.dashboard.createData', compact('data'));
}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('data.dashboard.index');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Insert data ke model Data
        $data = new Data;
        $data->name = $request->name;
        $data->save();

        if($data->save() == true) {
				// Data berhasil disimpan (true)
        notify()->success('Berhasil menambahkan Data baru', 'Operation Success');
        } else {
				// Data gagal disimpan (false)
        notify()->error('Gagal menambahkan Data baru', 'Operation Failed');
         }
         
        // Mendapatkan ID data yang baru saja diinsert
        $dataId = $data->id;

        return redirect()->route('createDataUser', ['dataId' => $dataId]);
        }

    public function createDataUser($dataId)
    {
        $data = Data::find($dataId);
        $users = User::all();

    return view('data.dashboard.createDataUser', compact('data', 'users'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
