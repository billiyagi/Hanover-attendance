<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $softDelete = false;

    // Membuat relasi one to many ke tabel data
    public function data()
    {
        return $this->hasMany(Data::class, 'id', 'data_id');
    }

    public static function exportCompiled()
    {
        return DB::table('report')
            ->join('data', 'report.data_id', '=', 'data.id')
            ->join('attendance_user', 'report.attendance_id', '=', 'attendance_user.id')
            ->select('report.id', 'report.name', 'report.range_start', 'report.range_end', 'data.name', 'attendance_user.name')
            ->get();
    }
    
    // Membuat relasi one to many ke tabel attendance_user
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'id', 'attendance_id');

    }
}
