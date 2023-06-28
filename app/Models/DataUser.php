<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataUser extends Model
{
    use HasFactory;

    //panggil tabel
    protected $table = 'data_user';
    // matikan timestamps
    public $timestamps = false;
    //kolom yang bisa diisi
    protected $fillable = [

    'name',
    'created_at',
    'updated_at',
    'data_id',
    'user_id'

    
    ];


}
