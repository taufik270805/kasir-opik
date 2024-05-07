<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nama_jenis' => 'Mie Goreng',
                'kategori_id' => 1
            ],
            [
                'nama_jenis' => 'Jus',
                'kategori_id' => 2
            ],
        ])->each(function ($item) {
            Kategori::create($item);
        });
    }
}
