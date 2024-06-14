@extends('layouts.app')

@section('content')
    <h1>Edit File</h1>
    <form action="{{ route('file-upload.update', $file->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nama_gambar">File Name</label>
            <input type="text" name="nama_gambar" id="nama_gambar" value="{{ $file->name }}" required>
        </div>
        <div>
            <label for="berkas">File (optional)</label>
            <input type="file" name="berkas" id="berkas">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
