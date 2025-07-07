<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $foto }}" alt="Foto {{ $nama }}" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h1>Profil Mahasiswa</h1>
                <p><strong>Nama:</strong> {{ $nama }}</p>
                <p><strong>NIM:</strong> {{ $nim }}</p>
                <p><strong>foto:</strong> {{ $foto }}</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
