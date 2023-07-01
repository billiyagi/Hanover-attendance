<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Membuat relasi one to many ke tabel attendance_user
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'id', 'attendance_id');

    }
}
