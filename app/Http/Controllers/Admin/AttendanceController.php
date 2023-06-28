<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Models\Attendance;
use App\Models\Data;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Attendance $attendance)
    {
        $attendances = $attendance::orderBy('created_at', 'desc')->paginate(5);
        // dd($attendances);
        return view('admin.attendance.index', compact('attendances'));
    }

    public function create()
    {

        $datas = Data::all();
        return view('admin.attendance.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceRequest $request, Attendance $attendance)
    {
        // Tambah data dan redirect sesuai kondisi berhasil atau gagal
        if ($attendance::create($request->validated())) {
            // Berhasil
            notify()->success('Absensi Berhasil Dibuat', 'Operation Success');
            return redirect()->to('/admin/attendance');
        } else {
            // Gagal
            notify()->error('Absensi Gagal Dibuat', 'Operation Failed');
            return redirect()->to('/admin/attendance');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }


    public function edit(string $id,)
    {
        $datas = Data::all();
        $attendance = Attendance::findOrFail($id);
        return view('admin.attendance.edit', compact('attendance', 'datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, AttendanceRequest $request, Attendance $attendance)
    {
        // Temukan data yang akan diubah
        $attendance = $attendance->find($id);

        // Ubah data dan redirect sesuai kondisi berhasil atau gagal
        if ($attendance->update($request->validated())) {
            // Berhasil
            notify()->success('Absensi Berhasil Diubah', 'Operation Success');
            return redirect()->to('/admin/attendance');
        } else {
            // Gagal
            notify()->error('Absensi Gagal Diubah', 'Operation Failed');
            return redirect()->to('/admin/attendance');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Attendance $attendance)
    {
        $attendance = $attendance->find($id);

        // Hapus data dan redirect sesuai kondisi berhasil atau gagal
        if ($attendance->delete()) {
            // Berhasil
            notify()->success('Absensi Berhasil Dihapus', 'Operation Success');
            return redirect()->to('/admin/attendance');
        } else {
            // Gagal
            notify()->error('Absensi Gagal Dihapus', 'Operation Failed');
            return redirect()->to('/admin/attendance');
        }
    }
}
