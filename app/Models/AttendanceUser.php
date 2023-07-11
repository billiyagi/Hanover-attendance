<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class AttendanceUser extends Model
{
    use HasFactory;

    protected $table = 'attendance_user';

    protected $fillable = [

        'present_id',
        'image_in',
        'present_out',
        'image_out',
        'created_at',
        'updated_at',
        'user_id',
        'attendance_id'
    ];

    

}
