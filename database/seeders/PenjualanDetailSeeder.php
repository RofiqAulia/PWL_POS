<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'penjualan_id' => 1,
                'barang_id' => 1,
                'harga' => 50000,
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 2,
                'harga' => 75000,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 3,
                'harga' => 60000,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
