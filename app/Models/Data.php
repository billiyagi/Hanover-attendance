<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    use HasFactory;
    //panggil tabel
    protected $table = 'data';
    //kolom yang bisa diisi
    protected $fillable = [

    'name'

    ];


}
