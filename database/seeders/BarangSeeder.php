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
                'kategori_id' => 1, // Sesuaikan dengan ID kategori Makanan
                'barang_kode' => 'DGT',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 8100000,
                'harga_jual' => 10000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2, // Sesuaikan dengan ID kategori Makanan
                'barang_kode' => 'ELNK',
                'barang_nama' => 'Kompor Listrik',
                'harga_beli' => 800000,
                'harga_jual' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3, // Sesuaikan dengan ID kategori Minuman
                'barang_kode' => 'PLST',
                'barang_nama' => 'Sampah plastik',
                'harga_beli' => 2000,
                'harga_jual' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4, // Sesuaikan dengan ID kategori Minuman
                'barang_kode' => 'FSH',
                'barang_nama' => 'Shimmer-shimmer',
                'harga_beli' => 30000,
                'harga_jual' => 130000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5, // Sesuaikan dengan ID kategori Barang
                'barang_kode' => 'RT',
                'barang_nama' => 'Sapu',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],           // Tambahkan data seed lainnya sesuai kebutuhan
        ];

        // Masukkan data seed ke dalam tabel m_barang
        DB::table('m_barang')->insert($barangData);
    }
}
