@extends('layouts.app')

{{-- Customize layout sections --}}
@section('title', 'Create Kategori')
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')
@section('content')
    <div class="card-body">
        <div class="form-group">
            <label for="kode_level">kode level</label>
            <input type="text" class="form-control" id="kode_level" name="kode_level" placeholder="Enter kode level">
        </div>
        <div class="form-group">
            <label for="nama_level">Nama level</label>
            <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="Enter nama_level">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection
