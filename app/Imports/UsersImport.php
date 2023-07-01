<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array
    {
        return [
            'username' => 'min:5|unique:users,username',
            'password' => 'min:8',
            'nip' => 'max:10|unique:users,nip'
        ];
    }

    public function customValidationMessages()
    {
        return [
            'username.min' => 'Username minimal :min karakter',
            'username.unique' => 'Username sudah digunakan',
            'password.min' => 'Password minimal :min karakter',
            'nip.unique' => 'NIP sudah digunakan',
            'nip.max' => 'NIP maksimal 10 karakter'
        ];
    }
    
    public function model(array $row)
    {
        return new User([
            'name' => $row['nama'],
            'username' => $row['username'],
            'nip' => $row['nip'],
            'email' => $row['email'],
            'role' => strtolower($row['role']),
            'password' => bcrypt($row['password']),
            'role_id' => strtolower($row['role']) == 'admin' ? 1 : 2,
            'avatar' => 'default.png'
        ]);
    }
}
