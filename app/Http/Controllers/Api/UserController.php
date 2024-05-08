<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status_code' => 200,
            'data' => UserModel::with('level')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required',
            'username' => 'required|unique:m_user',
            'nama' => 'required',
            'password' => 'required'
        ]);

        $user = UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json([
            'status_code' => 201,
            'data' => $user
        ]);
    }

    public function show(UserModel $user)
    {
        // Memuat relasi 'level' dari UserModel
        $user->load('level');

        // Mengembalikan respons JSON berisi data user dan informasi level
        return response()->json([
            'status_code' => 200,
            'user' => $user,
            'level' => $user->level
        ]);
    }

    public function update(Request $request, UserModel $user)
    {
        // Simpan perubahan pada instance UserModel
        $user->update([
            'level_id' => $request->filled('level_id') ? $request->level_id : $user->level_id,
            'username' => $request->filled('username') ? $request->username : $user->username,
            'nama' => $request->filled('nama') ? $request->nama : $user->nama,
            'password' => $request->filled('password') ? bcrypt($request->password) : $user->password,
            'updated_at' => now(),
        ]);

        // Mengembalikan respons JSON dengan data yang diperbarui
        return response()->json([
            'status_code' => 200,
            'data' => $user, // Mengambil data terbaru setelah perubahan
        ]);
    }

    public function destroy(UserModel $user)
    {
        $user->delete();

        return response()->json([
            'status_code' => 204,
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
