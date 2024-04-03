@extends('layouts.app')

{{-- Customize layout sections --}}
@section('title', 'Create Kategori')
@section('subtitle', 'form User')
@section('content_header_title', 'Form User')
@section('content_header_subtitle', 'Form User')
@section('content')

    <div class="card-body">
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" class="form-control" id="Username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="Password" class="form-control" id="password" name="password" placeholder="Enter Password">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

@endsection
