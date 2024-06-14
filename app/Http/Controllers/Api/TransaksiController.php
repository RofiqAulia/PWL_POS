<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function __invoke(Request $request) {
        // set validation
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // create barang
        $user = TransaksiModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'image' => $request->image->hashName(),
        ]);

        // return response JSON user is created
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        // return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }

    // Fungsi untuk menampilkan data transaksi yang telah didaftarkan
    public function show($id)
    {
        $transaksi = TransaksiModel::find($id);

        // Jika transaksi ditemukan
        if ($transaksi) {
            return response()->json([
                'success' => true,
                'transaksi' => $transaksi,
            ], 200);
        }

        // Jika transaksi tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Transaksi not found.',
        ], 404);
    }
}