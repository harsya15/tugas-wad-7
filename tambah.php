<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $berat_cucian = $_POST['berat_cucian'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $query = "INSERT INTO laundry (nama_pelanggan, berat_cucian, tanggal_masuk) VALUES ('$nama_pelanggan', '$berat_cucian', '$tanggal_masuk')";

    if ($koneksi->query($query) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Laundry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Data Laundry</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">
            </div>
            <div class="form-group">
                <label for="berat_cucian">Berat Cucian (kg):</label>
                <input type="number" step="0.01" name="berat_cucian" class="form-control" id="berat_cucian">
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
