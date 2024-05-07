<?php

namespace App\Imports;

use App\Models\stock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            stock::create([
                "menu_id" => $item['menu_id'],
                "jumlah" => $item['jumlah'],
            ]);
        }
    }
}
