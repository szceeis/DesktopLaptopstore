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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Pacifico&display=swap"
        rel="stylesheet">
</head>

<body style="background-image: url(bg-laptop2.jpg); background-size: cover;">
    <nav class="navbar" style="background-color: rgba(108, 117, 125, 0.7); font-family: 'Orbitron', sans-serif;">
        <div class="container">
            <h1 class="text-center  Helvetica Neue text-white ">HOME PAGE</h1>
            <img src="{{ asset("logo.png") }}" alt="Bootstrap" width="185" height="73" style="border-radius: 10px;">
        </div>
    </nav>

    <div class="container">
        <form action="{{ route('market') }}" method="GET" class="my-3 d-flex" role="search">
            <input type="text" name="search" class="form-control me-2" style="border: 2px solid darkblue;"
                placeholder="Cari nama laptop..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
        <button type="button" class="btn btn-outline-light mb-3" id="tambah">Tambah Data +</button>
        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <!-- <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Di buat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->merk }}</td>
                            <td>
                                <img src="{{ asset('fotoMarket/' . $row->foto) }}" alt="" width="150">
                            </td>
                            <td>{{ $row->jumlah_barang }}</td>
                            <td>Rp.{{ $row->harga_barang }}</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="/tampilData/{{ $row->id }}" class="btn btn-primary">Edit</a>
                                <a href="/delete/{{ $row->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> -->

            <div class="container d-flex flex-wrap justify-content-center gap-5 mb-5">

                @foreach ($data as $row)
                    <div class="card shadow bg-body-tertiary rounded" style="width: 18rem;">
                        <div style="border:2px solid black; background-position: center; background-size: cover; ">

                            <img src="{{ asset('fotoMarket/' . $row->foto) }}" class="card-img-center" alt="" width="250">
                        </div>
                        <div class="card-body bg-dark text-white">
                            <h5 class="" name="nama">{{ $row->nama }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white" nama="merk">{{ $row->merk }}</li>
                            <li class="list-group-item bg-dark text-white" nama="jumlah_barang">Stock {{ $row->jumlah_barang }}</li>
                            <li class="list-group-item bg-dark text-white" nama="harga_barang">Harga Rp.{{ number_format($row->harga_barang, 0, ',', '.') }}</li>
                        </ul>
                        <div class="card-body bg-dark text-white justify-content-center">
                            <a href="/tampilData/{{ $row->id }}" class="btn btn-outline-info px-5">Edit</a>
                            <a href="/delete/{{ $row->id }}" class="btn btn-outline-danger my-2" style="padding:0.5rem 2rem;">Hapus</a>
                            <a href="/beli/{{ $row->id }}" class="btn btn-outline-success text-white" style="padding: 0.5rem 6.5rem;">Beli</a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D"
        crossorigin="anonymous"></script>

    <script>
        document.getElementById('tambah').addEventListener('click', function () {
            window.location.href = '/tambahData';
        });
    </script>
</body>

</html>