@extends('m_user/template')

{{-- Custumize layouts section --}}

@section('subtitle', 'User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'User')

@section('content')
    <div class="container">

        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>CRUD user</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('m_user.create') }}">Input User</a>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive d-flex justify-content-center">
        <tr>
            <th class="text-center">User id</th>
            <th class="text-center">level name</th>
            <th class="text-center">Level id</th>
            <th class="text-center">Username</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Password</th>
            <th class="text-center">Actions</th>
        </tr>
        @foreach ($useri as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level->level_nama }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->nama }}</td>
                <td>{{ $m_user->password }}</td>

                <td class="text-center">
                    <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
