<?php 
    $d_blok=$conn->query("SELECT*FROM blok WHERE pusat_client='1'")->fetch_assoc();
    $id_st = $d_blok['id_blok']; // Id Kantor Daop 3
    //$id_blok = $d_blok['id_blok']; // Id Kantor Daop 3
    $name_st = $d_blok['name_blok']; // Nama 
    extract($d_blok); // khusus kantor daop
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#tab-monitoring" data-toggle="tab" aria-expanded="false">Monitoring</a></li>
  <li class=""><a href="#stasiun-info" data-toggle="tab" aria-expanded="true">Info Stasiun</a></li>
  <li class=""><a href="#stasiun-sett" data-toggle="tab" aria-expanded="false">Edit Info</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="tab-monitoring">
    <img src="./lib/img/LoaderIcon.gif" id="loaderIcon" style="display:none" />
    <div id="monitoring"></div>
  </div><!-- /.tab-pane -->
  <div class="tab-pane" id="stasiun-info">
    <!-- The timeline -->
       <?php 
            $sql_rq = "SELECT*FROM client WHERE id_blok='$id_blok'";
            $query_rq = $conn->query($sql_rq);
            $total_pc = $query_rq->num_rows;
          ?>
    <div class="panel-body">
        <ul>
            <li>Nama stasiun : <strong><?php echo $name_blok; ?></strong></li>
            <li>Alamat : <strong><?php echo $add_blok; ?></strong></li>
            <li>Telp : <strong>+<?php echo $telp_blok; ?></strong></li>
            <li>Jumlah PC : <strong><?php echo $total_pc; ?> PC</strong></li>
        </ul>
    </div>
  </div><!-- /.tab-pane -->

  <div class="tab-pane" id="stasiun-sett">
      <div class="tab-pane" id="stasiun-sett">
       <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editSt'>
          <i class='glyphicon glyphicon-pencil'></i> Edit
      </button>
      <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delSt'> Hapus
          <i class='glyphicon glyphicon-trash'></i>
      </button>
    </div><!-- /.tab-pane -->
  </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
<?php
    include 'modal.php';
    if (isset($_GET['pn'])) { // Settingan untuk pagging
        $pn = $_GET['pn'];
        $pn_link = "&pn=".$_GET['pn'];
    }
 ?>
 <script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>
<script>
$(document).ready(function() {
    $("#loaderIcon").show();
    var interval = setInterval(function() {
        $.ajax({
             url: 'view/pingger/ping-daop3.php?id=<?php echo $id_blok; if (isset($pn)) { echo $pn_link;}; ?>',
             success: function(data) {
                $("#loaderIcon").hide();
                $('#monitoring').html(data);
             }
        });
    }, 3000);
});
</script>
<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        $.ajax({
             url: 'asset/ex_mail.php',
             success: function(data) {
                $('#sendmail').html(data);
             }
        });
    }, 2000);
});
</script>