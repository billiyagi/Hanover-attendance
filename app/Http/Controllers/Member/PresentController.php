<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Present;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresentController extends Controller
{
    public function index()
    {
        // Set timezone
        $clockNow = Carbon::now('Asia/Jakarta')->format('H:i');

        // Get attendance status
        $attendance = Present::getAttendanceStatus(Auth::user(), Present::getAttendanceId(Auth::user()->id)->id);

        if ($attendance['status'] != 'not') {
            // Check if clock now is between time start and time start gap
            if ($clockNow >= $attendance['attendance']->time_end_deadline && $clockNow <= $attendance['attendance']->time_end_gap_deadline) {
                $attendance['status'] = 'open';
            } else {
                $attendance['status'] = 'close';
            }
        }



        return view('member.present.index', compact('attendance'));
    }

    public function store(Request $request)
    {

        // Convert data URI to image
        $convertFromDataUri = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->data_url));

        // Timestamp now
        $timestampNow = Carbon::now('Asia/Jakarta');

        // 77992_2023-07-10 04:10:21.png
        $fileName = Auth::user()->nip . "_" . $timestampNow . ".png";

        // Simpan gambar ke storage
        Storage::put("img/present/" . $fileName, $convertFromDataUri);

        // Save to database
        if (Present::create([
            'present_in' => $timestampNow,
            'image_in'  => $fileName,
            'present_out' => null,
            'image_out' => null,
            'attendance_id' => Present::getAttendanceId(Auth::user()->id)->id,
            'user_id'   => Auth::user()->id,
        ])) {
            notify('success', 'Berhasil melakukan absensi masuk');
            return redirect()->back();
        } else {
            notify('error', 'Gagal melakukan absensi masuk');
            return redirect()->back();
        }
    }
}
