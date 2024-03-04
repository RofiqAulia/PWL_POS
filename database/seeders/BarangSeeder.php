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
                'kategori_id' => 1, // Sesuaikan dengan ID kategori Digital
                'barang_kode' => 'DGT',
                'barang_nama' => 'HandPhone',
                'harga_beli' => 5000000,
                'harga_jual' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1, // Sesuaikan dengan ID kategori Elektronik
                'barang_kode' => 'ELNK',
                'barang_nama' => 'Kompor Listrik',
                'harga_beli' => 3000000,
                'harga_jual' => 4500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2, // Sesuaikan dengan ID kategori Plastik
                'barang_kode' => 'PLST',
                'barang_nama' => 'Tupper Ware',
                'harga_beli' => 200000,
                'harga_jual' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2, // Sesuaikan dengan ID kategori Fashion
                'barang_kode' => 'FSH',
                'barang_nama' => 'Jaket',
                'harga_beli' => 300000,
                'harga_jual' => 700000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3, // Sesuaikan dengan ID kategori Barang
                'barang_kode' => 'RT',
                'barang_nama' => 'sapu',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ];

        // Masukkan data seed ke dalam tabel m_barang
        DB::table('m_barang')->insert($barangData);
    }
}
