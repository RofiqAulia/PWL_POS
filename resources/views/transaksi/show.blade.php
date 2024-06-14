@extends('layoutss.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($transaksi)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
            Data yang Anda cari tidak ditemukan.
        </div>
        @else
        <table class="table table-bordered table-striped table-hover table-sm">
            <tr>
                <th>ID</th>
                <td>{{ $transaksi->penjualan_id }}</td>
            </tr>
            <tr>
                <th>Kode transaksi</th>
                <td>{{ $transaksi->penjualan_kode }}</td>
            </tr>
            <tr>
                <th>PIC</th>
                <td>{{ $transaksi->user->username }}</td>
            </tr>
            
            <tr>
                <th>Pembeli</th>
                <td>{{ $transaksi->pembeli }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $transaksi->penjualan_tanggal }}</td>
            </tr>
        </table>
        <h5 class="mt-4">Detail Penjualan</h5>
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detail_penjualan as $key => $detail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->barang->barang_kode }}</td>
                    <td>{{ $detail->barang->barang_nama }}</td>
                    <td>{{ $detail->harga }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ "Rp. ".($detail->harga * $detail->jumlah) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endempty
        <a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush