<?php

namespace App\Imports;

use App\Models\pelanggan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            pelanggan::create([
                "nama" => $item['nama'],
                "email" => $item['email'],
                "nomor_telepon" => $item['nomor_telepon'],
                "alamat" => $item['alamat'],
            ]);
        }
    }
}
