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
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-image: url('/bg-laptop2.jpg');
            background-size: cover;
            font-family: 'Quicksand', sans-serif;
            color: white;
        }

        .navbar {
            background-color: rgba(149, 117, 205, 0.7);
            font-family: 'Pacifico', cursive;
        }

        h1 {
            color: #f3e5f5;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid #ce93d8;
            color: white;
        }

        .form-control::placeholder {
            color: #e1bee7;
        }

        .form-label {
            color: #f3e5f5;
        }

        .btn-outline-info {
            border-color: #ba68c8;
            color: #e1bee7;
        }

        .btn-outline-info:hover {
            background-color: #ba68c8;
            color: white;
        }

        .container-form {
            max-width: 600px;
            background-color: rgba(103, 58, 183, 0.3);
            padding: 30px;
            border-radius: 15px;
            margin-top: 30px;
            box-shadow: 0 0 10px #ce93d8;
        }
    </style>
</head>

<body>
    <nav class="navbar p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-center">TAMBAH DATA</h1>
        </div>
    </nav>

    <div class="container container-form">
        <form action="/insertData" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama Laptop</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Asus Vivobook" required>
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label fw-semibold">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" placeholder="Contoh: Asus" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label fw-semibold">Stok</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label fw-semibold">Harga</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label fw-semibold">Masukkan foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required onchange="previewImage(event)">
                <img id="preview" src="#" alt="Preview Foto" style="display:none; margin-top:10px; max-width:200px;">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-outline-info px-5">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
