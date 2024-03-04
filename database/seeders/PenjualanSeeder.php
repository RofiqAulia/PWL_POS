<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
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
                'user_id' => 1,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Jane Doe',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Alice Smith',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
