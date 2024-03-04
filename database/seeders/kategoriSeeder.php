<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriData = [
            [
                'kategori_kode' => 'DGT',
                'kategori_nama' => 'Digital',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'ELNK',
                'kategori_nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'PLST',
                'kategori_nama' => 'Plastik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'FSH',
                'kategori_nama' => 'Fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'RT',
                'kategori_nama' => 'Rumah Tangga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data seed ke dalam tabel m_kategori
        DB::table('m_kategori')->insert($kategoriData);
    }
}
