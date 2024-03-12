<!DOCTYPE html>
<html lang="en">    
    <head>        
        <meta charset="utf-8" />
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <a href="{{route('/user/tambah')}}">+ Tambah User</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Kode Level</td>
                <td>Nama Level</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td>{{ $d->level->level_id}}</td>
                <td>{{ $d->level->level_nama}}</td>
                <td><a href="{{route('/user/ubah', $d->user_id)}}">Ubah</a>|<a href="{{route('/user/hapus', $d->user_id)}}">Hapus</a></td>
            </tr>
            @endforeach
            
        </table>
    </body>
</html>