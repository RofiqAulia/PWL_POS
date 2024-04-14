<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\m_barang;
use App\Models\m_user;
use App\Models\StokModel;
use App\Models\t_stok;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok'],
        ];
        $page = (object) [
            'title' => 'Daftar Stok yang terdaftar dalam sistem',
        ];

        $activeMenu = 'stok';

        $barang = m_barang::all();

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang]);
    }
    public function list(Request $request)
    {
        $stoks = t_stok::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')->with('barang')->with('user');

        if ($request->barang_id) {
            $stoks->where('barang_id', $request->barang_id);
        }

        return DataTables::of($stoks)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Stok Baru'
        ];

        $barang = m_barang::all(); //ambil data untuk ditampilkan di form
        $user = m_user::all(); //ambil data untuk ditampilkan di form
        $activeMenu = 'stok';
        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'barang_id' => 'bail|required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
            'user_id' => 'required|integer',
        ]);
        t_stok::create([
            'barang_id' => $request->barang_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'user_id' => $request->user_id,
        ]);

        return redirect('/stok')->with('success', 'Data Stok berhasil disimpan');
    }
    public function show(string $id)
    {
        $stok = t_stok::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.show', ['stok' => $stok, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $stok = t_stok::find($id);
        $barang = m_barang::all();
        $user = m_user::all();

        $breadcrumb = (object)[
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'stok' => $stok, 'barang' => $barang, 'user' => $user]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id' => 'bail|required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        t_stok::find($id)->update([
            'barang_id' => $request->barang_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
            'user_id' => $request->user_id,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check = t_stok::find($id);
        if (!$check) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            t_stok::destroy($id);

            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}