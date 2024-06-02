<title>Riwayat - Chirexs 1.0</title>
<h2 class='text text-primary'>Riwayat Konsultasi</h2>


<hr>
<?php
include "config/fungsi_alert.php";
$aksi = "modul/riwayat/aksi_hasil.php";
include "config/koneksi.php";

switch ($_GET['act']) {
    // Tampil hasil
  default:
    $offset = $_GET['offset'];
    //jumlah data yang ditampilkan perpage
    $limit = 15;
    if (empty($offset)) {
      $offset = 0;
    }

    $sqlgjl = mysqli_query($conn, "SELECT * FROM gejala ORDER BY kode_gejala+0");
    while ($rgjl = mysqli_fetch_array($sqlgjl)) {
      $argjl[$rgjl['kode_gejala']] = $rgjl['nama_gejala'];
    }

    $sqlpkt = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY kode_penyakit+0");
    while ($rpkt = mysqli_fetch_array($sqlpkt)) {
      $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
      $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
      $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
    }

    $tampil = mysqli_query($conn, "SELECT * FROM hasil ORDER BY id_hasil");
    $baris = mysqli_num_rows($tampil);
    if ($baris > 0) {
      echo "<div class='row'>
              <div class='col-md-8'>
                <table class='table table-bordered table-striped riwayat'>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Penyakit</th>
                      <th>Nilai CF</th>
                      <th class='text-center'>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>";

      $hasil = mysqli_query($conn, "SELECT * FROM hasil ORDER BY id_hasil LIMIT $offset, $limit");
      $no = 1 + $offset;
      $counter = 1;
      while ($r = mysqli_fetch_array($hasil)) {
        if ($r['hasil_id'] > 0) {
          $warna = $counter % 2 == 0 ? "table-secondary" : "table-light";
          echo "<tr class='" . $warna . "'>
                  <td align='center'>$no</td>
                  <td>$r[tanggal]</td>
                  <td>" . $arpkt[$r['hasil_id']] . "</td>
                  <td><span class='badge badge-secondary'>" . $r['hasil_nilai'] . "</span></td>
                  <td align='center'>
                    <a class='btn btn-info btn-sm' target='_blank' href='riwayat-detail/$r[id_hasil]'><i class='fa fa-eye' aria-hidden='true'></i> Detail</a>
                  </td>
                </tr>";
          $no++;
          $counter++;
        }
      }
      echo "</tbody></table></div>";
?>
      <div class="col-md-4">
        <div class="card border-success">
          <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0" style="background-color: aliceblue;">Grafik</h3>

          </div>
          <div class="card-body collapse show" id="card-body">
            <canvas id="donut-chart" style="width:100%;height:250px;"></canvas>
            <hr>
            <div id="legend-container"></div>
          </div>
        </div>
      </div>
<?php
      echo "</div><div class='col-md-12'><div class='row'><div class='paging'>";

      if ($offset != 0) {
        $prevoffset = $offset - $limit;
        echo "<span class='prevnext'><a href='index.php?module=riwayat&offset=$prevoffset'>Back</a></span>";
      } else {
        echo "<span class='disabled'>Back</span>"; //cetak halaman tanpa link
      }
      //hitung jumlah halaman
      $halaman = intval($baris / $limit); //Pembulatan

      if ($baris % $limit) {
        $halaman++;
      }
      for ($i = 1; $i <= $halaman; $i++) {
        $newoffset = $limit * ($i - 1);
        if ($offset != $newoffset) {
          echo "<a href='index.php?module=riwayat&offset=$newoffset'>$i</a>";
          //cetak halaman
        } else {
          echo "<span class='current'>" . $i . "</span>"; //cetak halaman tanpa link
        }
      }

      //cek halaman akhir
      if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
        //jika bukan halaman terakhir maka berikan next
        $newoffset = $offset + $limit;
        echo "<span class='prevnext'><a href='index.php?module=riwayat&offset=$newoffset'>Next</a></span>";
      } else {
        echo "<span class='disabled'>Next</span>"; //cetak halaman tanpa link
      }

      echo "</div></div></div>";
    } else {
      echo "<br><b>Data Kosong !</b>";
    }
}
?>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  $(document).ready(function() {
    <?php
    $hasilg = mysqli_query($conn, "SELECT hasil_id, count(hasil_id) jlh_id FROM hasil GROUP BY hasil_id ORDER BY jlh_id DESC");
    while ($rg = mysqli_fetch_array($hasilg)) {
      if ($rg['hasil_id'] > 0) {
        $arr[] = array('label' => $arpkt[$rg['hasil_id']], 'data' => $rg['jlh_id']);
      }
    }
    ?>
    var donutData = <?php echo json_encode($arr); ?>;

    var ctx = document.getElementById('donut-chart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: donutData.map(function(e) {
          return e.label;
        }),
        datasets: [{
          data: donutData.map(function(e) {
            return e.data;
          }),
          backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4D4BC0', '#9966ff', '#ff9f40'],
        }]
      },
      options: {
        responsive: true,
        legend: {
          display: true,
          position: 'bottom'
        }
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('[data-toggle="offcanvas"]').click(function() {
      $('#offcanvas').toggleClass('active');
    });
  });
</script>