@extends('layouts.app')

@section('subtitile', 'Admin')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Tampilan <?= (Auth::user()->level_id == 1)?'Admin':'Manager'; ?>
                <div class="card-body">
                    <h1>Login Sebagai:
                        <?= (Auth::user()->level_id == 1)?'Admin':'Manager'; ?>
                    </h1>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush