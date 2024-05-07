<?php

namespace App\Imports;

use App\Models\Meja;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            Meja::create([
                "nomor_meja" => $item['nomor_meja'],
                "kapasitas" => $item['kapasitas'],
                "status" => $item['status'],
            ]);
        }
    }
}
