<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Models\kategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create(): View
    {
        return view('kategori.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'kodeKategori' => 'bail|required|unique:m_kategori,kategori_kode',
            'namaKategori' => 'required',
        ]);

        // Buat data kategori baru berdasarkan input dari form
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);

        if (!$validated) {
            return redirect('/kategori/create')->withInput()->withErrors($validated);
        }

        kategoriModel::create([
            'kategori_kode' => $request->KodeKategori,
            'kategori_nama' => $request->namaKategori
        ]);

        // Redirect ke halaman kategori setelah berhasil menyimpan data
        return redirect('/kategori');
    }


    public function update($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.update', ['data' => $kategori]);
    }

    public function update_save($id, Request $request)
    {
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }

    public function delete($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}

