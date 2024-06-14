@extends('layoutss.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('transaksi') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">PIC</label>
                <div class="col-10">
                    <select class="form-control" id="username" name="user_id" required>
                        <option value="">- Pilih PIC -</option>
                        @foreach($user as $item)
                        <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                    @error('username')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Pembeli</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ old('pembeli') }}" required>
                    @error('pembeli')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <h5 class="mt-4">Tambah Detail Penjualan</h5>
            <div id="detail"></div>
            
            {{-- button to add barang --}}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="button" class="btn btn-primary btn-sm" id="add" onclick="addData()" >Tambah Barang</button>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('transaksi') }}">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush

<script>
    var i = 1;
    function addData() {
        i++;
        $('#detail').append(`
            <div id="row`+i+`">
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kode Barang</label>
                    <div class="col-10">
                        <select class="form-control" id="barang_id`+i+`" name="barang_id[]" required>
                            <option value="">- Pilih Barang -</option>
                            @foreach($barang as $item)
                            <option value="{{ $item->barang_id }}">{{ $item->barang_kode }} - {{ $item->barang_nama }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Jumlah</label>
                    <div class="col-10">
                        <input type="number" class="form-control" id="jumlah`+i+`" name="jumlah[]" value="{{ old('jumlah[]') }}" required>
                        @error('jumlah')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeData(`+i+`)">Hapus</button>
                    </div>
                </div>
            </div>
        `);
    }

    function removeData(id) {
        $('#row'+id).remove();
    }
</script>