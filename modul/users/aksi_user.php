<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
} else {
?>
<?php
    session_start();
    include "../../config/koneksi.php";

    $module = $_GET['module'];
    $act = $_GET['act'];

    //hapus pengajuan daftar
    if ($module == 'users' and $act == 'hapus') {
        mysqli_query($conn, "DELETE FROM users WHERE username='$_GET[id]'");
        header('location:../../index.php?module=' . $module);
    }
    //pengirimin konfirmasi penerimaan acc users
    elseif ($module == 'users' and $act == 'update') {
        $keterangan = 'Active';
        mysqli_query($conn, "UPDATE users SET
					keterangan   = '$keterangan'
               WHERE username       = '$_POST[id]'");
        header('location:../../index.php?module=' . $module);
    }
?>
<?php } ?>