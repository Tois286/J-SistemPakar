<?php
include 'config/koneksi.php';
$keterangan = 'Pending';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Lakukan validasi dan sanitasi data di sini

    if ($password === $confirm_password) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database (ganti dengan koneksi database Anda)

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (username, password,keterangan) VALUES ('$username', '$hashed_password','$keterangan')";

        if ($conn->query($sql) === TRUE) {
            echo "Pendaftaran berhasil!";
            // Redirect ke halaman login
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Password dan Konfirmasi Password tidak cocok.";
    }
}
