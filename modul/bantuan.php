<title>Bantuan - Chirexs 1.0</title>
<style>
  @media only screen and (max-width: 1220px) {
    img {
      width: 100%;
    }
  }
</style>
<h2 class="page-header">Bantuan Penggunaan Sistem Pakar</h2>
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false" id="bantuanPakar"><i class="fa fa-paper-plane" aria-hidden="true"></i> Bantuan Pakar</a></li>
    <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true" id="bantuanUser"><i class="fa fa-user" aria-hidden="true"></i> Bantuan User</a></li>
  </ul>
  <div class="tab-content">
    <?php if (isset($_SESSION['username'])) : ?>
      <div class="tab-pane" id="tab_1">
        <div style="text-align: center;">
          <br><br><br><br><br><br>
          <h2><i class="fa fa-phone" aria-hidden="true"></i> Hubungi Admin:</h2><br>
          Silahkan hubungi admin dengan mengklik tombol kontak admin. Jika butuh bantuan silahkan kirim pesan apa yang menjadi kendala.<br> Email yang terdaftar sebagai pakar akan di tindak lanjuti.<br><br>
          <button style="float: none;" class="kontak" data-toggle="modal" data-target="#modalForm">
            <i class="fa fa-envelope-square"></i> Kontak Admin
          </button><br><br><br><br><br><br>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <script>
    document.getElementById("bantuanPakar").addEventListener("click", function() {
      <?php if (!isset($_SESSION['username'])) : ?>
        alert("Anda harus login terlebih dahulu untuk menggunakan fitur ini.");
        window.location.href = 'index.php?module=<?php echo $module; ?>';
      <?php endif; ?>
    });

    const btnBantuanUser = document.getElementById('bantuanUser');

    btnBantuanUser.addEventListener('click', () => {
      location.reload();
    });
  </script>
  <!-- /.tab-pane -->
  <div class="tab-pane active" id="tab_2">
    <!-- /.box-header -->
    <div class="box-body">
      <div class="box-group"><!--id="accordion"-->
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                1. Cara mengakses Menu
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="box-body">
              <a href="animasi/bantuan/user/menu.gif" target="_blank"><img src="animasi/bantuan/user/menu.gif" alt="Mengakses Menu" /></a><br><br>
              <div style="font-size: 16px;">
                1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu di samping kiri<br>
                2. Selanjutnya silahkan klik atau tekan menu yang ingin anda masuki.<br>
                3. Menu yang anda kehendaki telah di tampilkan.<br>
              </div>
            </div>
          </div>
        </div>
        <div class="panel box box-danger">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                2. Cara Melakukan Diagnosa
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="box-body">
              <a href="animasi/bantuan/user/diagnosa.gif" target="_blank"><img src="animasi/bantuan/user/diagnosa.gif" alt="Mengakses Diagnosa" width="1000px" height="auto" /></a><br><br>
              <div style="font-size: 16px;">
                1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu diagnosa<br>
                2. Selanjutnya silahkan cari gejala yang di dapati di lapangan, misal ayam dengan gejala Nafsu makan berkurang.<br>
                3. Pilih keyakinan anda terhadap gejala tersebut.<br>
                4. Pilih salah satu keyakinan, misal hampir pasti ya.<br>
                5. Selanjutnya jika terdapat gejala lain anda dapat memilih kembali, dan mengisi seperti langkah 3 & 4.<br>
                6. jika sudah tekan tombol proses (<i class="fa fa-search-plus"></i>) di bawah untuk melihat hasil.
                6. Hasil Akan di tampilkan dan penyakit di derita dapat di ketahui.</div>
            </div>
          </div>
        </div>
        <div class="panel box box-warning">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="" aria-expanded="false">
                3. Cara Melihat Riwayat Konsultasi
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="box-body">
              <a href="animasi/bantuan/user/detail.gif" target="_blank"><img src="animasi/bantuan/user/detail.gif" alt="Mengakses Diagnosa" width="1000px" height="auto" /></a><br><br>
              <div style="font-size: 16px;">
                1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian menu riwayat<br>
                2. Selanjutnya silahkan cari riwayat yang dilihat, anda dapat menentukan riwayat mana berdasarkan tanggal.<br>
                3. Tekan tombol detail untuk melihat riwayat.<br>
                4. Jika sudah akan di arahkan ke hasil diagnosis yang telah di lakukan.<br>
                5. Anda dapat mencetak hasil diagnosis dengan menekan tombol cetak<br>
                6. Jika ingin melihat riwayat yang lain anda dapat mengklik navigasi, berupa angka di bawah hasil riwayat.
              </div>
            </div>
          </div>
        </div>
        <div class="panel box box-success">
          <div class="box-header with-border">
            <h4 class="box-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="" aria-expanded="false">
                4. Cara Melakukan Login
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="box-body">
              <a href="animasi/bantuan/user/login.gif" target="_blank"><img src="animasi/bantuan/user/login.gif" alt="Mengakses Diagnosa" width="1000px" height="auto" /></a><br><br>
              <div style="font-size: 16px;">
                1. Langkah pertama adalah mengarahkan kursor atau tangan ke bagian Login<br>
                2. Selanjutnya silahkan anda isi form login dengan username dan password anda<br>
                3. Jika anda belum memiliki akun silahkan anda tekan ajukan pendaftaran<br>
                4. Selanjutnya Tunggu sampai akun anda menerima aktifasi<br>
                5. Jika sudah menerima aktifasi silahkan klik tombol memliki akun login atau klik akun login<br>
                6. Selanjutnya isi form dan jika login anda berhasil anda akan menerima profile akun anda
              </div>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.tab-pane -->
  </div>
</div>
<script>
  var d = document.getElementById("pakarayam");
  d.className += " sidebar-collapse";
</script>
<script>
  $(document).ready(function() {
    $('.box-title a').click(function(e) {
      e.preventDefault();
      $(this).closest('.panel-collapse').toggleClass('active');
      $(this).closest('.panel').toggleClass('collapsed');
    });
  });
</script>