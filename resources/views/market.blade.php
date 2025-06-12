<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Market Trial</title>
    <link rel="icon" href="{{ asset(path: 'icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url(bg-laptop2.jpg);
            background-size: cover;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            font-family: 'Pacifico', cursive;
        }

        .navbar {
            background-color: rgba(155, 89, 182, 0.8) !important;
        }

        .btn-outline-primary,
        .btn-outline-info,
        .btn-outline-success,
        .btn-outline-danger,
        .btn-outline-light {
            border-color: #9b59b6;
            color: #9b59b6;
        }

        .btn-outline-primary:hover,
        .btn-outline-info:hover,
        .btn-outline-success:hover,
        .btn-outline-danger:hover,
        .btn-outline-light:hover {
            background-color: #9b59b6;
            color: white;
        }

        .card-body,
        .list-group-item {
            background-color: #f8f0fa !important;
            color: #6a1b9a !important;
        }

        .alert-success {
            background-color: #e1bee7;
            border-color: #ba68c8;
            color: #4a148c;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-white">HOME PAGE</h1>
        </div>
    </nav>

    <div class="container">
        <form action="{{ route('market') }}" method="GET" class="my-3 d-flex" role="search">
            <input type="text" name="search" class="form-control me-2" style="border: 2px solid #9b59b6;"
                placeholder="Cari nama laptop..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
        <button type="button" class="btn btn-outline-light mb-3" id="tambah">Tambah Data +</button>

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="container d-flex flex-wrap justify-content-center gap-5 mb-5">
            @foreach ($data as $row)
                <div class="card shadow rounded" style="width: 18rem;">
                    <div style="border: 2px solid #9b59b6; background-position: center; background-size: cover;">
                        <img src="{{ asset('fotoMarket/' . $row->foto) }}" class="card-img-top" alt="" width="250" style="max-height:200px; object-fit: cover;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->nama }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $row->merk }}</li>
                        <li class="list-group-item">Stock {{ $row->jumlah_barang }}</li>
                        <li class="list-group-item">Harga Rp.{{ number_format($row->harga_barang, 0, ',', '.') }}</li>
                    </ul>
                    <div class="card-body d-flex flex-column align-items-center">
                        <a href="/tampilData/{{ $row->id }}" class="btn btn-outline-info w-75 my-1">Edit</a>
                        <a href="/delete/{{ $row->id }}" class="btn btn-outline-danger w-75 my-1">Hapus</a>
                        <a href="/beli/{{ $row->id }}" class="btn btn-outline-success w-75 my-1">Beli</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('tambah').addEventListener('click', function () {
            window.location.href = '/tambahData';
        });
    </script>
</body>

</html>
