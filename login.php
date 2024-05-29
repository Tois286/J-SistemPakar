<?php
session_start();
include 'config/koneksi.php';
include 'config/fungsi_alert.php';

// Periksa apakah terdapat nilai pada input username dan password
if (isset($_POST['username']) && isset($_POST['password'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // Jika input username atau password kosong, arahkan kembali ke halaman login atau refresh
  if (empty($user) || empty($pass)) {
    header("Location: index.php");
    exit;
  }

  $login = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' and password='$pass'");
  $ketemu = mysqli_num_rows($login);
  $r = mysqli_fetch_array($login);

  if ($ketemu > 0) {
    $_SESSION['username'] = $r['username'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['nama_lengkap'] = $r['nama_lengkap'];
    header("location: index.php");
    exit;
  } else {
    // Jika input login salah, tampilkan pesan dan arahkan kembali ke halaman login
    echo "<link href='css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
        <link rel='stylesheet' href='animasi/login/ayam.css'>
        <link rel='stylesheet' href='aset/cinta.css'>
        <link href='css/main.css' rel='stylesheet' type='text/css' media='all'/>
        <link rel='stylesheet' href='aset/bootstrap.css'>
        <div class='errorpage'> <center><div class='danger'><i class='fa fa-exclamation-triangle'></i></div><br><h1>LOGIN GAGAL!</h1>
        Username dan Password anda salah.<br><br><input name='submit' id='submitku' type=submit style='padding: 6px 12px;' value='ULANGI LAGI' onclick=location.href='index.php'></a><br><p class='message'>Masih bingung, Kembali ke <a href='bantuan'>Halaman Bantuan</a></p></center></div>
        <div class='chick-wrapper-landing show'>  
        <div class='wing-back'></div>
        <div class='body'>
        <div class='eye-left'></div>
        <div class='eye-right'></div>
        </div>
        <div class='wing-front'></div>
        </div>
        <div class='chick-wrapper-run run'><img class='egg-lay' src='animasi/login/lay_egg.png'/>
        <div class='legs'>
        <div class='leg-l'></div>
        <div class='leg-r'></div>
        </div>
        <div class='wing-back'> </div>
        <div class='sweat-1'></div>
        <div class='sweat-2'></div>
        <div class='sweat-3'></div>
        <div class='body'>
        <div class='eye-liner'>
        <div class='eye'></div>
        </div>
        <div class='eye-lid'></div>
        <div class='cheek'></div>
        </div>
        <div class='sweat-last'></div>
        <div class='wing-front'></div>
        </div>
        <script  src='animasi/login/index.js'></script>";
    exit;
  }
} else {
  // Jika input username dan password tidak ditemukan, arahkan kembali ke halaman login atau refresh
  header("Location: index.php");
  exit;
}
