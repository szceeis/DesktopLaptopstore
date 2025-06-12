<?php?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Nota Pembelian</title>
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
    <div class="container mt-5 shadow rounded mb-5" style="border: 2px solid darkblue;max-width: 600px; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <h2>Nota Pembelian</h2>
        <hr>
        <p><strong>Nama Barang:</strong> {{ $market->nama }}</p>
        <p><strong>Merk:</strong> {{ $market->merk }}</p>
        <p><strong>Harga Satuan:</strong> Rp.{{ number_format($market->harga_barang) }}</p>
        <p><strong>Jumlah Beli:</strong> {{ $jumlahBeli }}</p>
        <p><strong>Total Harga:</strong> <b>Rp.{{ number_format($total) }}</b></p>
        <a href="{{ route('market') }}" class="btn btn-primary mb-3">Kembali ke Market</a>
    </div>
</body>
</html>