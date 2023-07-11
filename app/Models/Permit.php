<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PermitSakitRequest;
use App\Http\Requests\PermitCutiRequest;
use App\Http\Requests\PermitOtherRequest;
use Illuminate\Database\Eloquent\Builder;



class Permit extends Model
{
    use HasFactory;

    protected $table = 'permit';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function scopeFilter($searchQuery)
    {
        $query = $this->query();
        if (isset($searchQuery)) {
            return $query->where('name', 'like', '%' . $searchQuery . '%');
        } else {
            return $query;
        }
    }


}
