<?php
error_reporting(-1);
ini_set('display_errors', true);

// Your PHP code here
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Pakar - Chirexs 1.0</title>
  <link rel="stylesheet" href="aset/login/css/style.css">
  <base href="http://localhost/chirex-master/">
  <style>
    .form-container {
      position: relative;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .form-slide {
      position: absolute;
      width: 100%;
      height: 100%;
      transition: transform 0.6s ease;
    }

    .form-login {
      transform: translateX(0%);
    }

    .form-daftar {
      transform: translateX(100%);
    }

    .form-container.show-daftar .form-login {
      transform: translateX(-100%);
    }

    .form-container.show-daftar .form-daftar {
      transform: translateX(0%);
    }
  </style>
</head>

<body>
  <div class="form-container">
    <div class="form-slide form-login">
      <div class="ayaem">
        <div class="hand"></div>
        <div class="hand hand-r"></div>
        <div class="arms">
          <div class="arm"></div>
          <div class="arm arm-r"></div>
        </div>
      </div>
      <div class="formku">
        <div class="info">
          <h4><i class="fa fa-paper-plane"></i> Login Pakar</h4><br>
        </div>
        <form class="login-form" action="login.php" method="post" name="text_form">
          <input type=" text" name="username" id="username" placeholder="&#xf007;  Username" style="font-family:Arial, FontAwesome" />
          <input type="password" name="password" id="password" placeholder="&#xf023;  Password" style="font-family:Arial, FontAwesome" />
          <input type="submit" name="submit" id="submitku" value="Login" /><br>
        </form>
        Ajukan Permintaan <a href="#" id="showDaftar"><i class="fa fa-users"></i> <span>Buat Akun</span></a>
      </div>
    </div>

    <div class="form-slide form-daftar">
      <div class="ayaem">
        <div class="hand"></div>
        <div class="hand hand-r"></div>
        <div class="arms">
          <div class="arm"></div>
          <div class="arm arm-r"></div>
        </div>
      </div>
      <div class="formku">
        <div class="info">
          <h4><i class="fa fa-paper-plane"></i> Daftar Akun</h4><br>
        </div>
        <form class="login-form" action="daftar.php" method="post" name="daftar_form">
          <input type="text" name="username" id="username_daftar" placeholder="&#xf007;  Username" style="font-family:Arial, FontAwesome" />
          <input type="password" name="password" id="password" placeholder="&#xf023;  Password" style="font-family:Arial, FontAwesome" />
          <input type="password" name="confirm_password" id="md_password" placeholder="&#xf023;  Konfirmasi Password" style="font-family:Arial, FontAwesome" />
          <input type="alamat" name="alamat" id="alamat" placeholder="Alamat lengkap" style="font-family:Arial, FontAwesome" />
          <input type="no_tpln" name="no_tpln" id="no_tpln" placeholder="Isikan Nomor telphon anda" style="font-family:Arial, FontAwesome" />
          <input type="submit" name="submit" id="submitdaftar" value="Daftar" /><br>
        </form>
        Sudah punya akun? <a href="#" id="showLogin"><i class="fa fa-sign-in"></i> <span>Login</span></a>
      </div>
    </div>
  </div>

  <script>
    function Blank_TextField_Validator() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      if (username === "" || password === "") {
        alert("Username dan Password tidak boleh kosong");
        return false;
      }
      return true;
    }

    function Daftar_TextField_Validator() {
      var username = document.getElementById("username_daftar").value;
      var password = document.getElementById("password_daftar").value;
      var confirm_password = document.getElementById("confirm_password").value;

      if (username === "" || password === "" || confirm_password === "") {
        alert("Semua bidang harus diisi");
        return false;
      }

      if (password !== confirm_password) {
        alert("Password dan Konfirmasi Password tidak sama");
        return false;
      }

      return true;
    }

    document.getElementById('showDaftar').addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector('.form-container').classList.add('show-daftar');
    });

    document.getElementById('showLogin').addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector('.form-container').classList.remove('show-daftar');
    });
  </script>
</body>

</html>