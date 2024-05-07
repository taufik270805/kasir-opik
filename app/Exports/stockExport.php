<?php

namespace App\Exports;

use App\Models\stock;
use Maatwebsite\Excel\Concerns\FromCollection;

class stockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return stock::all();
    }
}
