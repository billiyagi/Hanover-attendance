<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    protected $table = 'roles';
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'role_id');
    }

}


