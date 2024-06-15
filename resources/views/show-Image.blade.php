@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
        </div>
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-6 mb-3">
                    <img src="{{ $path }}" alt="" class="img-fluid">
                </div>
                <hr>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Nama File</td>
                            <td>:</td>
                            <td>{{ $fileName }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td><a href="{{ $path }}">{{ $path }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection