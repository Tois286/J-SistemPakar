<title>Detail Riwayat - Chirexs 1.0</title>
<?php
include "config/koneksi.php";

// // Debugging: Tampilkan nilai GET dan POST
// var_dump($_GET);
// var_dump($_POST);

if (isset($_GET['id'])) {

  $id = intval($_GET['id']);  // Mengonversi id ke integer untuk keamanan

  // Inisialisasi variabel warna dan waktu
  $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
  date_default_timezone_set("Asia/Jakarta");
  $inptanggal = date('Y-m-d H:i:s');

  // Ambil data kondisi dari database
  $sqlkondisi = mysqli_query($conn, "SELECT * FROM kondisi ORDER BY id+0");
  if (!$sqlkondisi) {
    die("Query gagal: " . mysqli_error($conn));
  }
  while ($rkondisi = mysqli_fetch_array($sqlkondisi)) {
    $arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
  }

  // Ambil data penyakit dari database
  $sqlpkt = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY kode_penyakit+0");
  if (!$sqlpkt) {
    die("Query gagal: " . mysqli_error($conn));
  }
  while ($rpkt = mysqli_fetch_array($sqlpkt)) {
    $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
    $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
    $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
    $argpkt[$rpkt['kode_penyakit']] = $rpkt['gambar'];
  }

  // Ambil hasil diagnosa dari database
  $sqlhasil = mysqli_query($conn, "SELECT * FROM hasil WHERE id_hasil=$id");
  if (!$sqlhasil) {
    die("Query gagal: " . mysqli_error($conn));
  }
  if (mysqli_num_rows($sqlhasil) == 0) {
    die("Data tidak ditemukan.");
  }
  while ($rhasil = mysqli_fetch_array($sqlhasil)) {
    $arpenyakit = unserialize($rhasil['penyakit']);
    $argejala = unserialize($rhasil['gejala']);
  }

  $np1 = 0;
  foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
  }

  // Tampilkan hasil diagnosa
  echo "<div class='content'>
    <h2 class='text text-primary'>Hasil Diagnosis &nbsp;&nbsp;<button id='print' onClick='window.print();' data-toggle='tooltip' data-placement='right' title='Klik tombol ini untuk mencetak hasil diagnosa'><i class='fa fa-print'></i> Cetak</button> </h2>
          <hr><table class='table table-bordered table-striped diagnosa'> 
          <th width=8%>No</th>
          <th width=10%>Kode</th>
          <th>Gejala yang dialami (keluhan)</th>
          <th width=20%>Pilihan</th>
          </tr>";

  $ig = 0;
  foreach ($argejala as $key => $value) {
    $kondisi = $value;
    $ig++;
    $gejala = $key;
    $sql4 = mysqli_query($conn, "SELECT * FROM gejala WHERE kode_gejala = '$key'");
    if (!$sql4) {
      die("Query gagal: " . mysqli_error($conn));
    }
    $r4 = mysqli_fetch_array($sql4);
    echo '<tr><td>' . $ig . '</td>';
    echo '<td>G' . str_pad($r4['kode_gejala'], 3, '0', STR_PAD_LEFT) . '</td>';
    echo '<td><span class="hasil text text-primary">' . $r4['nama_gejala'] . "</span></td>";
    echo '<td><span class="kondisipilih" style="color:' . $arcolor[$kondisi] . '">' . $arkondisitext[$kondisi] . "</span></td></tr>";
  }
  $np = 0;
  foreach ($arpenyakit as $key => $value) {
    $np++;
    $idpkt[$np] = $key;
    $nmpkt[$np] = $arpkt[$key];
    $vlpkt[$np] = $value;
  }
  $gambar = $argpkt[$idpkt[1]] ? 'gambar/penyakit/' . $argpkt[$idpkt[1]] : 'gambar/noimage.png';
  echo "</table><div class='well well-small'><img class='card-img-top img-bordered-sm' style='float:right; margin-left:15px;' src='" . $gambar . "' height=200><h3>Hasil Diagnosa</h3>";
  echo "<div class='callout callout-default'>Jenis penyakit yang diderita adalah <b><h3 class='text text-success'>" . $nmpkt[1] . "</b> / " . round($vlpkt[1], 2) . " % (" . $vlpkt[1] . ")<br></h3>";
  echo "</div></div><div class='box box-info box-solid'><div class='box-header with-border'><h3 class='box-title'>Detail</h3></div><div class='box-body'><h4>";
  echo $ardpkt[$idpkt[1]];
  echo "</h4></div></div>
          <div class='box box-warning box-solid'><div class='box-header with-border'><h3 class='box-title'>Saran</h3></div><div class='box-body'><h4>";
  echo $arspkt[$idpkt[1]];
  echo "</h4></div></div>
          <div class='box box-danger box-solid'><div class='box-header with-border'><h3 class='box-title'>Kemungkinan lain:</h3></div><div class='box-body'><h4>";
  for ($ipl = 2; $ipl <= count($idpkt); $ipl++) {
    echo "<h4><i class='fa fa-caret-square-o-right'></i> " . $nmpkt[$ipl] . "</b> / " . round($vlpkt[$ipl], 2) . " % (" . $vlpkt[$ipl] . ")<br></h4>";
  }
  echo "</div></div>
		  </div>";
} else {
  echo "ID tidak ditemukan.";
}
?>
