{{-- @extends('layouts.app') --}}

{{-- Customize layout sections --}}

{{-- @section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
            <div class="kategoriCreate" style="padding-bottom: 10px; padding-left: 10px">
                <a href="{{ url('/kategori/create')}}">
                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush --}}

@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('kategori/create') }}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Level Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Kategori</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            var dataUser = $('#table_kategori').DataTable({
                serverSide: true, //serverside true jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('kategori/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex", //nomor urut dari laravel datatable addindexcolumn()
                    classname: "text-center",
                    orderable: false,
                    searchable: false
                }, {
                    data: "kategori_kode",
                    classname: "",
                    orderable: true, //orderable true jika ingin kolom bisa diurutkan
                    searchable: true //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "kategori_nama",
                    classname: "",
                    orderable: false, //orderable true jika ingin kolom bisa diurutkan
                    searchable: false //searchable true jika ingin kolom bisa dicari
                }, {
                    data: "aksi",
                    classname: "",
                    orderable: false, //orderable true jika ingin kolom bisa diurutkan
                    searchable: false //searchable true jika ingin kolom bisa dicari
                }]
            });
            $('#kategori_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
