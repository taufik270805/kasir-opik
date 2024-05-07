<?php

namespace App\Imports;

use App\Models\jenis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            jenis::create([
                "nama_jenis" => $item['nama_jenis'],
                "kategori_id" => $item['kategori_id'],
            ]);
        }
    }
}
