<?php

namespace App\Exports;

use App\Models\pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;

class pelangganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pelanggan::all();

    }
}
