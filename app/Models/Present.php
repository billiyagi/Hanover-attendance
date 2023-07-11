<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;

    protected $table = 'attendance_user';

    protected $guarded = ['id', 'updated_at', 'created_at'];


    public static function getAttendanceId($userId)
    {
        $userOnDataUser = DataUser::where('user_id', $userId)->first();
        return Attendance::where('data_id', $userOnDataUser->data_id)->first();
    }

    public static function getAttendanceStatus($user, $attendanceUserId)
    {
        // cek status attendance_user
        $attendanceUser = self::where('user_id', $user->id)
            ->where('attendance_id', $attendanceUserId)
            ->where('present_out', null)
            ->first();

        return [
            'status' => $attendanceUser ? 'open' : 'close',
            'attendance' => Attendance::find($attendanceUserId)
        ];
    }
}
