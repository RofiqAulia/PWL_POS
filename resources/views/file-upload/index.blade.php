@extends('layouts.app')

@section('content')
    <h1>Uploaded Files</h1>
    <a href="{{ route('file-upload.create') }}">Upload New File</a>
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ route('file-upload.show', $file->id) }}">{{ $file->name }}</a>
                <a href="{{ route('file-upload.edit', $file->id) }}">Edit</a>
                <form action="{{ route('file-upload.destroy', $file->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
