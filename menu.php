<?php
$module = htmlspecialchars(isset($_GET['module']) ? $_GET['module'] : '', ENT_QUOTES, 'UTF-8');
?>
<li><a <?php if ($module == "") echo 'class="active"'; ?> href="./"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  // Check if the user is an admin
  if ($_SESSION['role'] == 'admin') {
?>
    <li><a <?php if ($module == "admin") echo 'class="active"'; ?> href="admin"><i class="fa fa-user"></i> <span>Admin</span></a></li>
    <li><a <?php if ($module == "users") echo 'class="active"'; ?> href="users"><i class="fa fa-users"></i> <span>Users</span></a></li>
    <li><a <?php if ($module == "penyakit") echo 'class="active"'; ?> href="penyakit"><i class="fa fa-bug"></i> <span>Penyakit</span></a></li>
    <li><a <?php if ($module == "gejala") echo 'class="active"'; ?> href="gejala"><i class="fa fa-eyedropper"></i> <span>Gejala</span></a></li>
    <li><a <?php if ($module == "pengetahuan") echo 'class="active"'; ?> href="pengetahuan"><i class="fa fa-flask"></i> <span>Pengetahuan</span></a></li>
    <li><a <?php if ($module == "post") echo 'class="active"'; ?> href="post"><i class="fa fa-file-text"></i> <span>Post Keterangan</span></a></li>
    <li><a <?php if ($module == "password") echo 'class="active"'; ?> href="password"><i class="fa fa-edit"></i> <span>Ubah Password</span></a></li>
  <?php
  }
}
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
  // Display these items for all users except admins
  ?>
  <li><a <?php if ($module == "diagnosa") echo 'class="active"'; ?> href="diagnosa"><i class="fa fa-search-plus"></i> <span>Diagnosa</span></a></li>
  <li><a <?php if ($module == "riwayat") echo 'class="active"'; ?> href="riwayat"><i class="fa fa-clock-o"></i> <span>Riwayat</span></a></li>
  <li><a <?php if ($module == "keterangan") echo 'class="active"'; ?> href="keterangan"><i class="fa fa-commenting-o"></i> <span>Keterangan</span></a></li>

<?php
}
?>
<li><a <?php if ($module == "tentang") echo 'class="active"'; ?> href="tentang"><i class="fa fa-info-circle"></i> <span>Tentang</span></a></li>