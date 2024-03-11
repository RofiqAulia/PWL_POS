<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;


class UserController extends Controller
{

       //Praktikum 2.5
       public function index()
       {
            $user = UserModel::create([
                'username' =>'manager11',
                'nama' =>'Manager11',
                'password' =>Hash::make('12345'),
                'level_id' =>2
            ]);
            $user->username = 'manager12';

            $user->save();

            $user->wasChanged(); //true
            $user->wasChanged('username'); //false
            $user->wasChanged(['username', 'level_id']); //true
            $user->wasChanged('nama'); //false
            dd($user->wasChanged(['nama', 'username'])); //true 
          }
//    public function index()
//    {
//         $user = UserModel::firstOrNew(
//             [
//                 'username' => 'manager55',
//                 'nama' => 'Manager55',
//                 'password' => Hash::make('12345'),
//                 'level_id' => 2
//             ],
//         );
//         $user->username = 'manager56';

//         $user->isDirty();
//         $user->isDirty('username');
//         $user->isDirty('nama');
//         $user->isDirty(['nama','username']);

//         $user->isClean();
//         $user->isClean('username');
//         $user->isClean('nama');
//         $user->isClean(['nama', 'username']);    

//         $user->save();

//         $user->isDirty(); //false
//         $user->isClean(); //true
//         dd($user->isDirty());
//     }
//    //Praktikum 2.4
//    public function index()
//    {
//         $user = UserModel::firstOrNew(
//             [
//                 'username' => 'manager33',
//                 'nama' => 'Manager Tiga Tiga',
//                 'password' => Hash::make('12345'),
//                 'level_id' => 2
//             ],
//         );
//         $user->save();
//         return view('user', ['data' => $user]);
//    }
//    public function index()
//    {
//         $user = UserModel::firstOrCreate(
//             [
//                 'username' => 'manager22',
//                 'nama' => 'Manager Dua Dua',
//                 'password' => Hash::make('12345'),
//                 'level_id' => 2
//             ],
//         );
        
//         return view('user', ['data' => $user]);
//    }
    // Praktikum 2.2
    // public function index()
    // {
    //     $user = UserModel::where('level_id', 2)->count();
    
    //     return view('user', ['data'=> $user]);
    // }
    
    

    // Praktikum 2.1
    // public function index()
    // {

    //     // $user = UserModel::findOr(1, ['username','nama'], function(){
    //     //     abort(404);
    //     // });
    //     // $user = UserModel::findOr(1, function(){
    //     //     // ...
    //     // });

    //     // $user = UserModel::where('level_id','>',1)->firstOr(function(){
    //     //     // ...
    //     // });
    //     // $user = UserModel::firstWhere('level_id', 1);
    //     // $user = UserModel::where('level_id', 1)->first();
    //     // $user = UserModel::find(1);
    //     return view('user', ['data' => $user]);
    // }
    // Praktikum 1
    // public function index() {   

    //     $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_tiga',
    //         'nama' => 'Manager 3',
    //         'password' => Hash::make('12345')
    //     ];
    //     UserModel::create($data);

    //     $user = UserModel::all();
    //     return view('user', ['data'=> $user]);
    // //     $user->isDirty(); // cek apakah data yang diubah sudah berbeda dengan data sebelumnya atau tidak
    // //     //Tambah data user dengan eloquent Model
    // //     // $data =[
    // //     //     'username' => 'customer-1',
    // //     //     'nama' => 'pelanggan',
    // //     //     'password' => Hash::make('12345'),
    // //     //     'level_id' => 4
    // //     // ];
        
    // //     // UserModel::where('username', 'customer-1')->insert($data);//tambahkan data ke tabel m_user


    // //     // //coba akses model UserModel
    // //     // $user = UserModel::all();
    // //     // return view('user.index',['data'=>$user]);
    // }
}
