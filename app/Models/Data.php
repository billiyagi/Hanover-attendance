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


    public function attendance()
    {
        /**
         * Data adalah milik dari attendance yang id di tabel data
         * berhubungan dengan data_id di tabel attendance
         */
        return $this->belongsTo(Attendance::class, 'id', 'data_id');
    }
}
