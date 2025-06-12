<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Market Trial</title>
    <link rel="icon" href="{{ asset(path: 'icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('/bg-laptop2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .navbar {
            background-color: rgba(128, 0, 128, 0.7); /* ungu transparan */
            font-family: 'Pacifico', cursive;
        }

        .container-form {
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 12px;
            border: 2px solid #c084fc;
            margin-top: 40px;
            box-shadow: 0 0 15px #d8b4fe;
        }

        .form-label {
            color:rgb(123, 0, 255);
        }

        .form-control {
            background-color: transparent;
            color: white;
            border: 1px solid #e9d5ff;
        }

        .form-control:focus {
            border-color: #d946ef;
            box-shadow: 0 0 5px #f0abfc;
        }

        .btn-outline-primary {
            border-color: #c084fc;
            color: white;
        }

        .btn-outline-primary:hover {
            background-color: #c084fc;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar p-3">
        <div class="container">
            <h1 class="text-center w-100 text-white">Edit Data</h1>
        </div>
    </nav>

    <div class="container container-form">
        <form action="/updateData/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label fw-bold">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $data->jumlah_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="form-label fw-bold">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ $data->harga_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label fw-bold">Masukkan Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required onchange="previewImage(event)">
                @if($data->foto)
                    <img id="preview" src="{{ asset('fotoMarket/'.$data->foto) }}" alt="Foto Barang" style="margin-top:10px; max-width:200px;">
                @else
                    <img id="preview" src="#" alt="Preview Foto" style="display:none; margin-top:10px; max-width:200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-outline-primary mt-3 px-4">Simpan</button>
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
