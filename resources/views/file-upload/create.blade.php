@extends('layouts.app')

@section('content')
    <h1>Upload New File</h1>
    <form action="{{ route('file-upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama_gambar">File Name</label>
            <input type="text" name="nama_gambar" id="nama_gambar" required>
        </div>
        <div>
            <label for="berkas">File</label>
            <input type="file" name="berkas" id="berkas" required>
        </div>
        <button type="submit">Upload</button>
    </form>
@endsection
