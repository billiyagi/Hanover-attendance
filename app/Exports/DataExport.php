<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::all('id', 'name', 'created_at', 'updated_at');
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Created At', 'Updated At'];
    }

}
