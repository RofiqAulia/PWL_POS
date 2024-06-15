@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('/file-upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="filename" class="col-sm-2 col-form-label">Nama Gambar:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="filename" id="filename">
                    @error('filename')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="berkas" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="berkas" name="berkas">
                    @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            @if ($errors->has('upload_error'))
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <div class="text-danger">{{ $errors->first('upload_error') }}</div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
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
