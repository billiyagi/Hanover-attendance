<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    use HasFactory;
    //panggil tabel
    protected $table = 'users';
    // matikan timestamps
    public $timestamps = false;
    //kolom yang bisa diisi
    protected $fillable = [

    'name',
    'username',
    'nip',
    'email_verified_at',
    'password',
    'avatar',
    'remember_token',
    'created_at',
    'edit_at',
    'role_id',
    
    ];

    // Membuat relasi one to many ke tabel roles
    public function roles()
    {
        return $this->hasMany(Roles::class, 'id', 'data_id');
    }

    

    public function getAllData()
    {
        return DB::table('users')
            ->join('roles', 'users.role_id', '=',
            'roles.id')
            ->select('users.*', 'roles.name as role')
            ->get();
        }
      public function scopeSearch($query, $value)
    {
        return $query->where('name', 'like', '%'.$value.'%')
                    ->orWhere('email', 'like', '%'.$value.'%')
                    ->orWhere('nip', 'like', '%'.$value.'%')
                    ->orWhere('role', 'like', '%'.$value.'%');
    }
}
