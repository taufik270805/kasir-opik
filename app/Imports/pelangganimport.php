<?php

namespace App\Imports;

use App\Models\pelanggan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class pelangganimport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            pelanggan::create([
                'nama' => $row['nama'],
                'email' => $row['email'],
                'nomor_telepon' => $row['nomor_telepon'],
                'alamat' => $row['alamat'],
            ]);
        }
    }
}
