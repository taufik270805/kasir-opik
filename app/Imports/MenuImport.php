<?php

namespace App\Imports;

use App\Models\jenis;
use App\Models\Menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $item) {
            $jenis = jenis::where('nama_jenis', $item['nama_jenis'])->first();

            Menu::create([
                'nama' => $item['nama'],
                'harga' => $item['harga'],
                'image' => $item['image'],
                'deskripsi' => $item['deskripsi'],
                'jenis_id' => $jenis->id,
            ]);
        }
    }
}
