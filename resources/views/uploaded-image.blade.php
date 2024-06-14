<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploaded Image</title>
</head>

<body>

    <div class="container mt-3">
        <h2>Gambar Berhasil Di Upload ke <a href="{{ $imageUrl }}">{{ $nama_file }}</a></h2>
        <hr>

        <img src="{{ $imageUrl }}" alt="Uploaded Image" width="500px" class="img-fluid">

    </div>

</body>

</html>
