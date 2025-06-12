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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Pacifico&display=swap"
        rel="stylesheet">
</head>
<body style="background-image: url('{{ asset('bg-laptop2.jpg') }}'); background-size: cover;" class="text-white">
    <nav class="navbar" style="background-color: rgba(108, 117, 125, 0.7); font-family: 'Orbitron', sans-serif;">
        <div class="container">
            <h1 class="text-center  Helvetica Neue text-white ">PEMBELIAN</h1>
            <img src="{{ asset("logo.png") }}" alt="Bootstrap" width="185" height="73" style="border-radius: 10px;">
        </div>
    </nav>
    <div class="container mt-5" style="max-width: 600px; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <h2>Beli Laptop: {{ $data->nama }}</h2>
        <img src="{{ asset('fotoMarket/' . $data->foto) }}" alt="" width="200" class="mb-3">
        <form action="{{ route('prosesBeli', $data->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label><strong>Stok tersedia:</strong> {{ $data->jumlah_barang }}</label>
            </div>
            <div class="mb-3">
                <label for="jumlah_beli" class="from-label fw-bold">Jumlah Beli</label>
                <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" min="1" max="{{ $data->jumlah_barang }}" 
                style="background-color: transparent; color: white;" required>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <button type="submit" class="btn btn-outline-info px-5">Beli</button>
            <a href="{{ route('market') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>