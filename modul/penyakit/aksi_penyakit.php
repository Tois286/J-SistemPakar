<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
  header('location:index.php');
  exit();
} else {
  include '../../config/koneksi.php'; // Pastikan untuk meng-include file koneksi database Anda

  $module = $_GET['module'] ?? '';
  $act = $_GET['act'] ?? '';
  $id = $_GET['id'] ?? '';

  // Pastikan koneksi database ada sebelum digunakan
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Hapus penyakit
  if ($module == 'penyakit' && $act == 'hapus' && !empty($id)) {
    $stmt = $conn->prepare("DELETE FROM penyakit WHERE kode_penyakit = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->close();
    header('location:../../index.php?module=' . $module);
  }

  // Input penyakit
  elseif ($module == 'penyakit' && $act == 'input') {
    $nama_penyakit = $_POST['nama_penyakit'];
    $srn_penyakit = $_POST['srn_penyakit'];
    $fileName = $_FILES['gambar']['name'];
    $fileTmpName = $_FILES['gambar']['tmp_name'];

    if (!empty($fileName)) {
      move_uploaded_file($fileTmpName, "../../gambar/penyakit/" . $fileName);
    }

    $stmt = $conn->prepare("INSERT INTO penyakit (nama_penyakit, srn_penyakit, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_penyakit, $srn_penyakit, $fileName);
    $stmt->execute();
    $stmt->close();

    header('location:../../index.php?module=' . $module);
  }

  // Update penyakit
  elseif ($module == 'penyakit' && $act == 'update') {
    $nama_penyakit = $_POST['nama_penyakit'];
    $srn_penyakit = $_POST['srn_penyakit'];
    $fileName = $_FILES['gambar']['name'];
    $fileTmpName = $_FILES['gambar']['tmp_name'];
    $kode_penyakit = $_POST['id'];

    if (!empty($fileName)) {
      move_uploaded_file($fileTmpName, "../../gambar/penyakit/" . $fileName);

      $stmt = $conn->prepare("UPDATE penyakit SET nama_penyakit = ?, srn_penyakit = ?, gambar = ? WHERE kode_penyakit = ?");
      $stmt->bind_param("ssss", $nama_penyakit, $srn_penyakit, $fileName, $kode_penyakit);
    } else {
      $stmt = $conn->prepare("UPDATE penyakit SET nama_penyakit = ?, srn_penyakit = ? WHERE kode_penyakit = ?");
      $stmt->bind_param("sss", $nama_penyakit, $srn_penyakit, $kode_penyakit);
    }

    $stmt->execute();
    $stmt->close();

    header('location:../../index.php?module=' . $module);
  }

  // Tutup koneksi database
  $conn->close();
}
