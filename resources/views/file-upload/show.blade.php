@extends('layouts.app')

@section('content')
    <h1>{{ $file->name }}</h1>
    <img src="{{ $file->path }}" alt="{{ $file->name }}" style="max-width:100%; height:auto;">
    <p><a href="{{ route('file-upload.index') }}">Back to list</a></p>
@endsection
