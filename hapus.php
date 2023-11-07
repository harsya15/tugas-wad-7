<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM laundry WHERE id='$id'";

    if ($koneksi->query($query) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>
