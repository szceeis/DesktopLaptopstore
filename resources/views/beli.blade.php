<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Beli Laptop</title>
    <link rel="icon" href="{{ asset(path: 'icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-image: url('/bg-laptop2.jpg');
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .navbar {
            background-color: rgba(186, 104, 200, 0.7); /* Soft purple */
            font-family: 'Pacifico', cursive;
        }

        h1, h2 {
            color: #f3e5f5;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid #ce93d8;
            color: white;
        }

        .form-label {
            color: #f3e5f5;
        }

        .container-form {
            max-width: 600px;
            background-color: rgba(123, 31, 162, 0.3);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px #ce93d8;
        }

        .btn-outline-info {
            border-color: #ba68c8;
            color: #e1bee7;
        }

        .btn-outline-info:hover {
            background-color: #ba68c8;
            color: white;
        }

        .btn-secondary {
            background-color: #ab47bc;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #9c27b0;
        }

        .alert-danger {
            background-color: rgba(255, 82, 82, 0.8);
            border: none;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-center">PEMBELIAN</h1>
        </div>
    </nav>

    <div class="container container-form mt-5">
        <h2>Beli Laptop: <strong>{{ $data->nama }}</strong></h2>
        <img src="{{ asset('fotoMarket/' . $data->foto) }}" alt="Foto Laptop" width="200" class="mb-3 rounded shadow">
        
        <form action="{{ route('prosesBeli', $data->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label><strong>Stok tersedia:</strong> {{ $data->jumlah_barang }}</label>
            </div>
            <div class="mb-3">
                <label for="jumlah_beli" class="form-label fw-bold">Jumlah Beli</label>
                <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" min="1" max="{{ $data->jumlah_barang }}" required>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-outline-info px-5">Beli</button>
                <a href="{{ route('market') }}" class="btn btn-secondary px-4">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
