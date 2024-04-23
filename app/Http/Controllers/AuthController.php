<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    public function index() {
        // kita ambil data user lalu simpan pada variabel $user
        $user = Auth::user();

        // kondisi jika usernya ada
        if ($user) {
            // jika usernya memiliki level admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            }
            // jika usernya memiliki level manager
            else if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request) {
        // kita buat validasi pada saat tombol login diklik
        // validasinya username & password wajib diisi
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // ambil data request username & password saja
        $credential = $request->only('username', 'password');
        //cek jika data username dan password valid (sesuai) dengan data
        if (Auth::attempt($credential)) {
            
            // kalau berhasil simpan data usernya di variabel $user
            $user = Auth::user();

            // cek lagi jika level user admin maka arahkan ke halaman admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            } 
            // tapi jika level usernya user biasa maka arahkan kehalaman user
            else if ($user->level_id == '2') {
                return redirect()->intended('manager');
            }
            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }

        // jika tidak ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesar error juga kalau login gagal yaa...
        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }

    public function register() {
        // tampilkan view register
        return view('register');
    }

    // aksi form register
    public function proses_register(Request $request) {
        // kita buat validasi untuk proses register
        // validasinya yaitu semua field wajid diisi
        // validasi username harus unique atau tidak boleh ada duplicate username
        $validator = Validator::make($request->all(), [
            'nama' => 'required', 
            'username' => 'required|unique:m_user', 
            'password' => 'required', 
        ]);

        // kalau gagal kembali ke halaman registrasi dengan menampilkan pesan error
        if ($validator->fails()) {
            return redirect('/register')
            ->withErrors($validator)
            ->withInput();
        }

        // jika berhasil isi level & hash passwornya
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);

        // masukkan semua data pada request ke table user
        UserModel::create($request->all());

        // kalau berhasil arahkan ke halaman login
        return redirect()->route('login');
    }

    public function logout(Request $request) {
        // logout itu harus menghapus sessionnya
        $request->session()->flush();

        // jalankan juga dungsi logout pada auth
        Auth::logout();

        // kembali ke halaman login
        return Redirect('login');
    }
}