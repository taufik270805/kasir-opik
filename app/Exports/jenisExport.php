<?php

namespace App\Exports;

use App\Models\jenis;
use Maatwebsite\Excel\Concerns\FromCollection;

class jenisExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return jenis::all();
    }
}
