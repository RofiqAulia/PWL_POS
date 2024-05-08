<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\m_kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = m_kategori::all();

        return response()->json([
            'status_code' => 200,
            'data' => $kategoris
        ]);
    }

    public function store(Request $request)
    {
        $kategori = m_kategori::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return response()->json([
            'status_code' => 201,
            'data' => $kategori
        ]);
    }

    public function show(m_kategori $kategori)
    {
        return response()->json([
            'status_code' => 200,
            'data' => $kategori
        ]);
    }

    public function update(Request $request, m_kategori $kategori)
    {
        $kategori->update($request->all());

        return response()->json([
            'status_code' => 200,
            'data' => $kategori
        ]);
    }

    public function destroy(m_kategori $kategori)
    {
        $kategori->delete();

        return response()->json([
            'status_code' => 204,
            'success' => true,
            'message' => 'Kategori terhapus',
        ]);
    }
}