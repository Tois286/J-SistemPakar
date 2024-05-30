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

  // Query untuk memeriksa username dan password di tabel admin
  $login_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
  $ketemu_admin = mysqli_num_rows($login_admin);
  $r_admin = mysqli_fetch_array($login_admin);

  // Jika ditemukan di tabel admin
  if ($ketemu_admin > 0) {
    $_SESSION['username'] = $r_admin['username'];
    $_SESSION['password'] = $r_admin['password'];
    $_SESSION['nama_lengkap'] = $r_admin['nama_lengkap'];
    $_SESSION['role'] = 'admin'; // Menyimpan role pengguna dalam sesi
    header("Location: index.php"); // Ganti dengan halaman dashboard admin
    exit;
  }

  // Query untuk memeriksa username dan password di tabel users
  $login_user = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
  $ketemu_user = mysqli_num_rows($login_user);
  $r_user = mysqli_fetch_array($login_user);

  // Jika ditemukan di tabel users
  if ($ketemu_user > 0) {
    if ($r_user['keterangan'] == 'Active') {
      $_SESSION['username'] = $r_user['username'];
      $_SESSION['password'] = $r_user['password'];
      $_SESSION['role'] = 'user'; // Menyimpan role pengguna dalam sesi
      header("Location: index.php"); // Ganti dengan halaman dashboard user
      exit;
    } else {
      // Jika user tidak aktif, tampilkan pesan dan arahkan kembali ke halaman login
      echo "<link href='css/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
                    <link rel='stylesheet' href='animasi/login/ayam.css'>
                    <link rel='stylesheet' href='aset/cinta.css'>
                    <link href='css/main.css' rel='stylesheet' type='text/css' media='all'/>
                    <link rel='stylesheet' href='aset/bootstrap.css'>
                    <div class='errorpage'> <center><div class='danger'><i class='fa fa-exclamation-triangle'></i></div><br><h1>LOGIN GAGAL!</h1>
                    Akun anda belum aktif. Silahkan hubungi administrator.<br><br><input name='submit' id='submitku' type=submit style='padding: 6px 12px;' value='ULANGI LAGI' onclick=location.href='index.php'></a><br><p class='message'>Masih bingung, Kembali ke <a href='bantuan'>Halaman Bantuan</a></p></center></div>
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
  }
} else {
  // Jika input username dan password tidak ditemukan, arahkan kembali ke halaman login atau refresh
  header("Location: index.php");
  exit;
}
