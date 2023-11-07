<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $berat_cucian = $_POST['berat_cucian'];
    $tanggal_masuk = $_POST['tanggal_masuk'];

    $query = "UPDATE laundry SET nama_pelanggan='$nama_pelanggan', berat_cucian='$berat_cucian', tanggal_masuk='$tanggal_masuk' WHERE id='$id'";

    if ($koneksi->query($query) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM laundry WHERE id='$id'";
    $result = $koneksi->query($query);
    $data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Laundry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Laundry</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan:</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>">
            </div>
            <div class="form-group">
                <label for="berat_cucian">Berat Cucian (kg):</label>
                <input type="number" step="0.01" name="berat_cucian" class="form-control" id="berat_cucian" value="<?php echo $data['berat_cucian']; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?php echo $data['tanggal_masuk']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
