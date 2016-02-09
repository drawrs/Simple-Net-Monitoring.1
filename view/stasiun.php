<?php 
  if (isset($_GET['id'])) {
      $id_st = mysqli_real_escape_string($conn, $_GET['id']);
      $sql = "SELECT*FROM blok WHERE id_blok='$id_st'";
      $query = $conn->query($sql);
      if ($get = $query->fetch_assoc()) {
          extract($get);
      }
    
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#tab-monitoring" data-toggle="tab" aria-expanded="false">Monitoring</a></li>
  <li class=""><a href="#stasiun-info" data-toggle="tab" aria-expanded="true">Info Stasiun</a></li>
  <li class=""><a href="#stasiun-sett" data-toggle="tab" aria-expanded="false">Setting</a></li>
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
     <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editSt'>
        <i class='glyphicon glyphicon-pencil'></i> Edit
    </button>
    <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delSt'>
    <i class='glyphicon glyphicon-trash'></i>
     Hapus
    </button>
    <button class='btn btn-success btn-sm' onclick="window.location.href='./asset/proses.php?make_pusat=<?php echo $id_blok; ?>'">
        <i class='glyphicon glyphicon-plus'></i>
         Jadikan blok utama
    </button>
  </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->

<?php
include 'modal.php';
} else {
    $sql = "SELECT*FROM blok";
    $query = $conn->query($sql);
    echo '<div class="col-md-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-list"></i>
                  <h3 class="box-title">Daftar Stasiun</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="list-unstyled" style="margin-left:10px;">';
        while ($get = $query->fetch_assoc()) {
            extract($get);
            echo "<li><a href='./stasiun&id=$id_blok'><h5><i class='fa fa-train'></i>&nbsp;&nbsp; $name_blok</h5></a></li>";
            echo '';
        }
    echo"</ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>";
    }

?>
<script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>
<?php 
if (isset($_GET['pn'])) {
    $pn = $_GET['pn'];
    $pn_link = "&pn=".$_GET['pn'];
}
 ?>
<script>
$(document).ready(function() {
    $("#loaderIcon").show();
    var interval = setInterval(function() {
        $.ajax({
             url: 'view/pingger/ping-st-tes.php?id=<?php echo $id_blok; if (isset($pn)) { echo $pn_link;}; ?>',
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
