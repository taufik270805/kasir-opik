<?php

namespace App\Exports;

use App\Models\category;
use Maatwebsite\Excel\Concerns\FromCollection;

class categoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return category::all();
    }
}
