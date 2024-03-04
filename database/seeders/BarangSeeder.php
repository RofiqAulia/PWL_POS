<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data seed untuk tabel m_barang
        $barangData = [
            [
                'barang_id' => 1, // Sesuaikan dengan ID kategori Digital
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 1, // Sesuaikan dengan ID kategori Elektronik
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2, // Sesuaikan dengan ID kategori Plastik
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2, // Sesuaikan dengan ID kategori Fashion
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3, // Sesuaikan dengan ID kategori Barang
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ];

        // Masukkan data seed ke dalam tabel m_barang
        DB::table('m_barang')->insert($barangData);
    }
}
