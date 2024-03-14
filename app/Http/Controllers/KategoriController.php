<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Models\kategoriModel;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        kategoriModel::create([
            'kategori_kode' => $request->KodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        
        return redirect('/kategori');
    }
    // public function index()
    // {
    //     // $data = [
    //     //     'kategori_kode' => 'SNK',
    //     //     'kategori_nama' => 'Snack/Makanan Ringan',
    //     //     'created_at' => now()
    //     // ];

    //     // DB::table('m_kategori')->insert($data);
    //     // return 'Insert data baru berhasil';

    //     // $row = DB::table('m_kategori') ->where('kategori_kode', 'SNK') ->update(['kategori_nama'=>'camilan']);
    //     // return 'Update data berhasil. Jumlah data yang di update: '. $row. ' baris';

    //     // $data = DB::table('m_kategori')->get();
    //     // return view('kategori', ['data'=>$data]);
    // }
}
