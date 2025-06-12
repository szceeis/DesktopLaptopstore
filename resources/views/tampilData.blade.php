<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset(path: 'icon.png') }}">
    <title>Market Trial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Pacifico&display=swap"
        rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('bg-laptop2.jpg') }}'); background-size: cover;" class="text-white">
    <nav class="navbar" style="background-color: rgba(108, 117, 125, 0.7); font-family: 'Orbitron', sans-serif;">
        <div class="container">
            <h1 class="text-center  Helvetica Neue text-white ">EDIT DATA</h1>
            <img src="{{ asset("logo.png") }}" alt="Bootstrap" width="185" height="73" style="border-radius: 10px;">
        </div>
    </nav>
    <div class="container" style="max-width: 600px; background-color: rgba(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
        <form action="/updateData/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="from-label fw-bold">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" 
                style="background-color: transparent; color: white;" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="from-label fw-bold">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $data->jumlah_barang }}" 
                style="background-color: transparent; color: white;" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="from-label fw-bold">Harga Barang</label>
                <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="{{ $data->harga_barang }}" 
                style="background-color: transparent; color: white;" required>
            </div>
            <div class="mb-3">
                <label for="harga_barang" class="from-label fw-bold">Masukkan foto</label>
                <input type="file" class="form-control mb-3" id="foto" name="foto" 
                style="background-color: transparent; color: white;" required onchange="previewImage(event)">
                @if($data->foto)
                    <img id="preview" src="{{ asset('fotoMarket/'.$data->foto) }}" alt="Foto Barang" style="margin-bottom:10px; max-width:200px;">
                @else
                    <img id="preview" src="#" alt="Preview Foto" style="display:none; margin-bottom:10px; max-width:200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
        </form>
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
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>

</html>