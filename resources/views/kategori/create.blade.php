@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'kategori');
@section('content_header_title', 'kategori');
@section('content_header_subtitle', 'Create');

@section('content')
    <div class="container">
        <div class="card card-primary">
            <h3 class="card-header">Buat Kategori Baru</h3>
            </div>
            <form method="POST" action="../kategori">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kodeKategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" placeholder="Masukkan kode kategori">
                    </div>
                    <div class="form-group">
                        <label for="namaKategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="namaKategori" name="namaKategori" placeholder="Masukkan Nama kategori">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection