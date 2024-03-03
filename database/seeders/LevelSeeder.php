<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['level_id' => 1, 'level_kode' =>'ADM', 'level_nama' => 'Administrator'],
            ['level_id' => 2, 'level_kode' =>'MNG', 'level_nama' => 'Manager'],
            ['level_id' => 3, 'level_kode' =>'STF', 'level_nama' => 'Staff/Kasir'],
        ];

        DB::table('m_level')->insert($data);
    }
    // public function run(): void
    // {
    //     $data = [
    //         [
    //             'user_id' => 1,
    //             'level_id' => 1,
    //             'username' => 'admin',
    //             'nama' => 'Administrator',
    //             'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
    //         ],
    //         [
    //             'user_id' => 2,
    //             'level_id' => 2,
    //             'username' => 'manager',
    //             'nama' => 'Manager',
    //             'password' => Hash::make('12345'),
    //         ],
    //         [
    //             'user_id' => 3,
    //             'level_id' => 3,
    //             'username' => 'staff',
    //             'nama' => 'Staff/Kasir',
    //             'password' => Hash::make('12345'),
    //         ]
    //     ];
    
    //     DB::table('m_user')->insert($data);
    // }
}    
