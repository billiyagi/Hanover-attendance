<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $guarded = ['id', 'creatd_at', 'updated_at'];

    protected $softDelete = false;

    // Membuat relasi one to many ke tabel data
    public function data()
    {
        return $this->hasMany(Data::class, 'id', 'data_id');
    }

    // Membuat relasi one to many ke tabel attendance_user
    public function attendanceUser()
    {
        return $this->hasMany(AttendanceUser::class, 'attendance_user_id', 'id');
    }

    // Membuat relasi one to many ke tabel report
    public function report()
    {
        return $this->belongsTo(Report::class, 'attendance_id', 'id');
    }
}
