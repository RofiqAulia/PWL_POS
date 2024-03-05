<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;

class UserController extends Controller
{
   
    
    public function index() {   

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        //Tambah data user dengan eloquent Model
        // $data =[
        //     'username' => 'customer-1',
        //     'nama' => 'pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        
        UserModel::where('username', 'customer-1')->insert($data);//tambahkan data ke tabel m_user


        //coba akses model UserModel
        $user = UserModel::all();
        return view('user.index',['data'=>$user]);
    }
}
