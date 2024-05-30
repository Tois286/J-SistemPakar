<?php
switch ($_GET['act']) {
        // Hapus users
    case 'hapus':
        $id_users = $_GET['id'];
        mysqli_query($conn, "DELETE FROM users WHERE id_users='$id_users'");
        echo "<script>alert('User berhasil dihapus'); window.location.href='index.php?module=users';</script>";
        break;

        // Terima users
    case 'terima':
        $id_users = $_GET['id'];
        $keterangan = 'Active';
        mysqli_query($conn, "UPDATE users SET keterangan='$keterangan' WHERE id_users='$id_users'");
        echo "<script>alert('Status berhasil diupdate'); window.location.href='index.php?module=users';</script>";
        break;
        //tolak Users
    case 'tolak':
        $id_users = $_GET['id'];
        $keterangan = 'Rejected';
        mysqli_query($conn, "UPDATE users SET keterangan='$keterangan' WHERE id_users='$id_users'");
        echo "<script>alert('Status berhasil diupdate'); window.location.href='index.php?module=users';</script>";
        break;

        // Tampil users dan proses pencarian
    default:
        $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
        $limit = 10;

        if (isset($_POST['Go']) && !empty($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM users WHERE username LIKE '%$keyword%' ORDER BY username LIMIT $offset, $limit";
            $totalQuery = "SELECT COUNT(*) as count FROM users WHERE username LIKE '%$keyword%'";
        } else {
            $query = "SELECT * FROM users ORDER BY username LIMIT $offset, $limit";
            $totalQuery = "SELECT COUNT(*) as count FROM users";
        }

        $tampil = mysqli_query($conn, $query);
        $totalResult = mysqli_query($conn, $totalQuery);
        $totalRow = mysqli_fetch_assoc($totalResult)['count'];

        echo "<br><form method='POST' action='?module=users' name='text_form'>
              <br><table class='table table-bordered'>
              <tr>
                <td>
                  <input type='text' name='keyword' style='margin-left: 10px;' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' />
                  <input class='btn bg-olive margin' type='submit' value='Cari' name='Go'>
                </td>
              </tr>
              </table></form>";

        if ($totalRow > 0) {
            echo "<table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Keterangan</th>
                      <th width='21%'>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>";

            $no = 1 + $offset;
            while ($r = mysqli_fetch_array($tampil)) {
                echo "<tr>
                      <td align='center'>$no</td>
                      <td>{$r['username']}</td>
                      <td align='center' style='color: " . ($r['keterangan'] == 'Rejected' ? 'yellow' : ($r['keterangan'] == 'Active' ? 'green' : 'black')) . "; background-color: #B8B8B8C9; font-weight: bold;'>{$r['keterangan']}</td>
                      <td align='center' style='width: 30%;'>
                        <a class='btn btn-success  btn-sm' href='?module=users&act=terima&id={$r['id_users']}'><i class='fa fa-check' aria-hidden='true'></i> Terima</a> &nbsp;
                        <a class='btn btn-warning btn-sm' href='?module=users&act=tolak&id={$r['id_users']}'><i class='fa fa-close' aria-hidden='true'></i> Tolak</a> &nbsp;
                        <a class='btn btn-danger btn-sm'  href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya?', '?module=users&act=hapus&id={$r['id_users']}', '', '', '', 'u', 'n', 'Self', 'Self')\"><i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
                      </td>
                      </tr>";
                $no++;
            }

            echo "</tbody></table>";

            // Pagination
            echo "<div class='paging'>";
            if ($offset != 0) {
                $prevoffset = $offset - $limit;
                echo "<span class='prevnext'><a href='index.php?module=users&offset=$prevoffset'>Back</a></span>";
            } else {
                echo "<span class='disabled'>Back</span>";
            }

            $halaman = intval($totalRow / $limit);
            if ($totalRow % $limit) {
                $halaman++;
            }
            for ($i = 1; $i <= $halaman; $i++) {
                $newoffset = $limit * ($i - 1);
                if ($offset != $newoffset) {
                    echo "<a href='index.php?module=users&offset=$newoffset'>$i</a>";
                } else {
                    echo "<span class='current'>$i</span>";
                }
            }

            if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
                $newoffset = $offset + $limit;
                echo "<span class='prevnext'><a href='index.php?module=users&offset=$newoffset'>Next</a></span>";
            } else {
                echo "<span class='disabled'>Next</span>";
            }
            echo "</div>";
        } else {
            echo "<br><b>Data Kosong!</b>";
        }
        break;
}
