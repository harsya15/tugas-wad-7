<?php
include 'koneksi.php';

$query = "SELECT * FROM laundry";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Laundry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        body {
            background-image: url('/background/gambar_laundry.jpg'); /* Ganti dengan path file gambar latar belakang Anda */
            background-size: fit;
            background-repeat: repeat;
             /* Warna teks untuk kontras dengan latar belakang */
        }
        .container {
            background-color: rgba(0, 0, 0, 0.5); /* Warna latar belakang semi transparan untuk konten */
            padding: 20px;
            border-radius: 10px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang kartu */
            border-radius: 10px;
        }
        /* Gaya tambahan sesuai kebutuhan */
    </style>
<body>
    <div class="container mt-4">
        <h2>Data Laundry</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nama_pelanggan']; ?></h5>
                                <p class="card-text">Berat Cucian: <?php echo $row['berat_cucian']; ?> kg</p>
                                <p class="card-text">Tanggal Masuk: <?php echo $row['tanggal_masuk']; ?></p>
                                <a href='edit.php?id=<?php echo $row['id']; ?>' class='btn btn-info btn-sm'>Edit</a>
                                <a href='hapus.php?id=<?php echo $row['id']; ?>' class='btn btn-danger btn-sm'>Hapus</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada data</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
