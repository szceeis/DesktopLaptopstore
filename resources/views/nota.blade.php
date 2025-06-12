<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nota Pembelian</title>
    <link rel="icon" href="{{ asset(path: 'icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: url('/bg-laptop2.jpg');
            background-size: cover;
            font-family: 'Quicksand', sans-serif;
            color: white;
        }

        .navbar {
            background-color: rgba(186, 104, 200, 0.7);
            font-family: 'Pacifico', cursive;
        }

        .container-nota {
            max-width: 600px;
            background-color: rgba(123, 31, 162, 0.3);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px #ce93d8;
            border: 2px solid #ba68c8;
        }

        h2 {
            color: #f8bbd0;
            font-family: 'Pacifico', cursive;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #ba68c8;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ab47bc;
        }

        hr {
            border-color: #f3e5f5;
        }
    </style>
</head>

<body>
    <nav class="navbar p-3">
        <div class="container">
            <h1 class="text-center w-100 text-white">PEMBELIAN</h1>
        </div>
    </nav>

    <div class="container mt-5 shadow container-nota mb-5">
        <h2 class="text-center">Nota Pembelian</h2>
        <hr>
        <p><strong>Nama Barang:</strong> {{ $market->nama }}</p>
        <p><strong>Merk:</strong> {{ $market->merk }}</p>
        <p><strong>Harga Satuan:</strong> Rp.{{ number_format($market->harga_barang) }}</p>
        <p><strong>Jumlah Beli:</strong> {{ $jumlahBeli }}</p>
        <p><strong>Total Harga:</strong> <b>Rp.{{ number_format($total) }}</b></p>
        <div class="text-center mt-4">
            <a href="{{ route('market') }}" class="btn btn-primary px-4">Kembali ke Market</a>
        </div>
    </div>
</body>
</html>
