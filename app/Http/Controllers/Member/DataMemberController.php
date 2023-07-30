<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\AttendanceUser;
use App\Models\Permit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DataMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, AttendanceUser $attendanceUser)
    {

         // Mendapatkan input bulan dan tahun dari query string
        $currentMonth = $request->input('month', date('m'));
        $currentYear = $request->input('year', Carbon::now()->year);

        // Konversi ke tipe data yang sesuai
        $currentMonth = str_pad($currentMonth, 2, '0', STR_PAD_LEFT);

        // Menghitung bulan sebelumnya dan bulan berikutnya
        $prevMonth = date('m', strtotime($currentYear . '-' . $currentMonth . ' -1 month'));
        $nextMonth = date('m', strtotime($currentYear . '-' . $currentMonth . ' +1 month'));
        $prevYear = date('Y', strtotime($currentYear . '-' . $currentMonth . ' -1 month'));
        $nextYear = date('Y', strtotime($currentYear . '-' . $currentMonth . ' +1 month'));

        $attendanceData = DB::table('attendance_user')
            ->where('user_id', Auth::user()->id)
            ->get();

        $days = [];

        $numberOfDays = Carbon::createFromDate($currentYear, $currentMonth)->daysInMonth;

        for ($day = 1; $day <= $numberOfDays; $day++) {

            if($day <= 9) {
                $day = '0' . $day;
            } else {
                $day = $day;
            }

            // $hasAttendance = $attendanceData->contains('day', $day);

            // $dayClass = $hasAttendance ? 'active' : '';

            // Konversi timestamp created_at
            $dataToConvert = DB::table('attendance_user')
                ->where('user_id', Auth::user()->id)
                ->where('created_at', 'like', $currentYear. '-' . $currentMonth . '-'. $day . '%')
                ->first();


            if(!empty($dataToConvert)) {
                $dateConversion = Carbon::parse($dataToConvert->created_at)->format('d');
            } else {
                $dateConversion = $day;
            }


            // Periksa apakah tanggal $day sama dengan $dateConversion
            if($day == $dateConversion) {
                $attendanceData = DB::table('attendance_user')
                    ->where('user_id', Auth::user()->id)
                    ->where('created_at', 'like', $currentYear. '-' . $currentMonth . '-' . $day . '%')->first();
            } else {
                $attendanceData = [];
            }
            $dayData = [
                'day' => $day,
                // 'class' => $dayClass,
                'attendanceData' => $attendanceData,

            ];


            $days[] = $dayData;
        }
        // dd($days);

        return view('member.data.index', compact('days', 'currentMonth', 'currentYear', 'attendanceData', 'prevMonth', 'nextMonth', 'prevYear', 'nextYear'));
        
        // $currentMonth = date('m');
        // $currentYear = Carbon::now()->year;
        // $currentDate = Carbon::now()->day;

        // $attendanceData = DB::table('attendance_user')
        //     ->where('user_id', Auth::user()->id)
        //     ->get();


        // $days = [];

        // $numberOfDays = Carbon::createFromDate($currentYear, $currentMonth)->daysInMonth;

        // for ($day = 1; $day <= $numberOfDays; $day++) {

        //     if($day <= 9) {
        //         $day = '0' . $day;
        //     } else {
        //         $day = $day;
        //     }

        //     // $hasAttendance = $attendanceData->contains('day', $day);

        //     // $dayClass = $hasAttendance ? 'active' : '';

        //     // Konversi timestamp created_at
        //     $dataToConvert = DB::table('attendance_user')
        //         ->where('user_id', Auth::user()->id)
        //         ->where('created_at', 'like', $currentYear. '-' . $currentMonth . '-'. $day . '%')
        //         ->first();
            
            
        //     if(!empty($dataToConvert)) {
        //         $dateConversion = Carbon::parse($dataToConvert->created_at)->format('d');
        //     } else {
        //         $dateConversion = $day;
        //     }

            
        //     // Periksa apakah tanggal $day sama dengan $dateConversion
        //     if($day == $dateConversion) {
        //         $attendanceData = DB::table('attendance_user')
        //             ->where('user_id', Auth::user()->id)
        //             ->where('created_at', 'like', $currentYear. '-' . $currentMonth . '-' . $day . '%')->first();
        //     } else {
        //         $attendanceData = [];
        //     }
        //     $dayData = [
        //         'day' => $day,
        //         // 'class' => $dayClass,
        //         'attendanceData' => $attendanceData,

        //     ];

                           
        //     $days[] = $dayData;
        // }
        // // dd($days);

        // return view('member.data.index', compact('days', 'currentMonth', 'currentYear', 'attendanceData'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
