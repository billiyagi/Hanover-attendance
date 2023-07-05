<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\DataUser;
use App\Models\User;
use App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUserExport implements FromCollection, WithHeadings
{
    protected $data;
    protected $users;

    public function __construct(Data $data, $users)
    {
        $this->data = $data;
        $this->users = $users;
    }

    public function collection()
    {
        $dataArr = [];
        foreach ($this->users as $user) {
            $dataArr[] = [
                'Data ID' => $this->data->id,
                'Data Name' => $this->data->name,
                'User ID' => $user->id,
                'User Name' => $user->name,
                'Nip' => $user->nip,
                'Email' => $user->email
            ];
        }

        return collect($dataArr);
    }

    public function headings(): array
    {
        return [
            'Data ID',
            'Data Name',
            'User ID',
            'User Name',
            'Nip',
            'Email'
        ];
    }
}
