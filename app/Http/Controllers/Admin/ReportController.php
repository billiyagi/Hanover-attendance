<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Attendance;
use App\Models\Data;
use App\Models\Report;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Report $report)
    {
        // Tampilkan halaman index dengan semua data report
        $query = Report::latest()->orderBy('created_at');

        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        $reports = $query->paginate(5);

        return view('admin.report.index', compact('reports'));
    }

    // Export data ke excel
    public function export($type = 'excel')
    {
        // Nama file digenarate sesuai tanggal dan waktu downloadnya
        $fileName = 'report-' . date('Y-m-d_H-i-s');

        // Generate file excel & pdf
        if ($type == 'excel') {
            return Excel::download(new ReportExport, $fileName . '.xlsx');
        } elseif ($type == 'pdf') {
            return Excel::download(new ReportExport, $fileName . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        }


        //return Excel::download(new ReportExport, 'report.xlsx');
    }

    public function create()
    {
        $attendances = Attendance::all();
        return view('admin.report.create', compact('attendances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request, Report $report)
    {
        // Tambah data dan redirect sesuai kondisi berhasil atau gagal
        if ($report::create($request->validated())) {
            // Berhasil
            notify()->success('Laporan Berhasil Dibuat', 'Operation Success');
            return redirect()->to('/admin/report');
        } else {
            // Gagal
            notify()->error('Laporan Gagal Dibuat', 'Operation Failed');
            return redirect()->to('/admin/report');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id,)
    {
        $attendances = Attendance::all();
        $report = report::findOrFail($id);
        return view('admin.report.edit', compact('report', 'attendances'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, ReportRequest $request, Report $report)
    {
        //Temukan data yang akan diupdate
        $report = $report::find($id);

        //Ubah data dan redirect sesuai kondisi berhasil atau gagal
        if ($report->update($request->validated())) {
            //Berhasil
            notify()->success('Laporan Berhasil Diubah', 'Operation Success');
            return redirect()->to('/admin/report');
        } else {
            //Gagal
            notify()->error('Laporan Gagal Diubah', 'Operation Failed');
            return redirect()->to('/admin/report');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Report $report)
    {
        //
        $report = $report::find($id);

        //Hapus data dan redirect sesuai kondisi berhasil atau gagal
        if ($report->delete()) {
            //Berhasil
            notify()->success('Laporan Berhasil Dihapus', 'Operation Success');
            return redirect()->to('/admin/report');
        } else {
            //Gagal
            notify()->error('Laporan Gagal Dihapus', 'Operation Failed');
            return redirect()->to('/admin/report');
        }
    }
}
