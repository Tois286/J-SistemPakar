<?php
include 'config/koneksi.php';
$keterangan = 'Pending';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $no_tpln = $_POST['no_tpln'];
    $md_password = md5($_POST['md_password']);

    // Lakukan validasi dan sanitasi data di sini
    $sql = "INSERT INTO users (username, alamat,no_tpln,password, md_password,keterangan) VALUES ('$username','$alamat','$no_tpln', '$password','$md_password','$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil!";
        // Redirect ke halaman login
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
