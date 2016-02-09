<?php ####################################################
#
#          Simple Network Monitoring
#      Rizal Khilman - fb.me/rizal.ofdraw
#           codinger-mini.blogspot.com
#########################################################
#
#       log ini menampilkan laporan pengirimah email 
#           sebelum hari ini kebelakang. untuk log 
#     hari ini tidak ditampilkan krena msh dibutuhkan
#                     Sistem.
#
#########################################################
$this_date = date("d M Y");
$sql_l = "SELECT*FROM log NATURAL LEFT JOIN client WHERE date_log!='$this_date' ORDER BY id_log DESC";
$query_l = $conn->query($sql_l);

 ?>

<div class="box-body">
<form method="post" action="asset/proses.php?del_log">
<strong>Tandai semua :</strong> <input type="checkbox" class="master-noreg flat-red"> &nbsp;&nbsp;&nbsp;
<button class='btn btn-danger btn-sm' type="submit" onclick="alert('Hapus yang ditandai?');"> Hapus
<i class='glyphicon glyphicon-trash'></i></button>
    <table id="log-report" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>#</th>
        <th>Nama Host</th>
        <th>Ip Host</th>
        <th>Tanggal</th>
        <th>Jam</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $no=0;
    while ($a_log = $query_l->fetch_assoc()) {
        $no++;
            extract($a_log);
            if (!isset($ip_client)) {
                $ip_client = "<strong><i>Data client telah dihapus.</i></strong>";
                $name_client = "<strong><i>Data client telah dihapus.</i></strong>";
            }
            echo "<tr>
                    <td>$no</td>
                    <td><input type='checkbox'class='noreg' name='id_log[]' value='$id_log'/></td>
                    <td>$name_client</td>
                    <td>$ip_client</td>
                    <td>$date_log</td>
                    <td>$hour_log.00 WIB</td>
                  </tr>";
        }
     ?>
    </tfoot>
  </table>
  </form>
  
</div>
