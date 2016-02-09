<?php
date_default_timezone_set("Asia/Jakarta");
    if (strcmp($page, "home")==0) { 
      ################
      # Halaman Home
      ################
        function showNotif() {
          if (isset($_GET['st'])) {
                    if ($_GET['st'] == 1) {
                          echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil disimpan.
                            </div><br />';
                    } elseif ($_GET['st'] == 2) {
                          echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal menyimpan.
                            </div><br />';
                    }
                  }
        }
        $d_blok=$conn->query("SELECT (name_blok) FROM blok WHERE pusat_client='1'")->fetch_assoc();
        $judul = $d_blok['name_blok'];
        $pantau = 1;
        $notif = 'true';
        $halaman = "./view/beranda.php";
      } elseif (strcmp($page, "add_client")==0) {
        ########################
        # SETTING TAMBAH CLIENT
        ########################
        function showNotif() {
          if (isset($_GET['st'])) {
            if ($_GET['st']==1) {
            echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil ditambahkan.
                            </div><br />';
          } elseif ($_GET['st']==2) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal menyimpan.
                            </div><br />';
          } elseif ($_GET['st']==3) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Data tidak boleh kosong.
                            </div><br />';
          }
          }
        }
        $notif = 'true';
        $pantau = 0;
        $judul = "Tambah Client";
        $halaman = "./view/add_client.php";
      } elseif (strcmp($page, "add_stasiun")==0) {
        ########################
        # SETTING TAMBAH STASIUN
        ########################
        function showNotif() {
          if (isset($_GET['st'])) {
            if ($_GET['st']==1) {
            echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil ditambahkan.
                            </div><br />';
          } elseif ($_GET['st']==2) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal menyimpan.
                            </div><br />';
          } elseif ($_GET['st']==3) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Data tidak boleh kosong.
                            </div><br />';
          }
          }
        }
        $notif = 'true';
        $pantau = 0;
        $judul = "Tambah stasiun";
        $halaman = "./view/add_stasiun.php";
      } elseif (strcmp($page, "stasiun")==0) {
        ########################
        # SETTING TAMPIL STASIUN
        ########################
        
        function showNotif() {
          if (isset($_GET['st'])) {
            if ($_GET['st']==1) {
                echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil disimpan.
                            </div><br />';
            } elseif ($_GET['st']==2) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal menyimpan.
                            </div><br />';
            } elseif ($_GET['st']==3) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Data tidak boleh kosong.
                            </div><br />';
            } elseif ($_GET['st']==4) {
                echo '<div class="callout callout-success" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil dihapus.
                            </div><br />';
            } elseif ($_GET['st']==5) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal dihapus.
                            </div><br />';
            }
        }
        }
        $notif = 'true';
        if (isset($_GET['id'])) {
          $getID = mysqli_real_escape_string($conn, $_GET['id']);
          $d_blok=$conn->query("SELECT (name_blok) FROM blok WHERE id_blok='$getID'")->fetch_assoc();
          $judul = $d_blok['name_blok'];
          $pantau = 1;
        } else {
          $pantau = 0;
          $judul = "Monitoring";
        }
        $halaman = "./view/stasiun.php";
      } elseif (strcmp($page, "katasandi")==0) {
        ########################
        # SETTING TAMBAH STASIUN
        ########################
        function showNotif() {
          if (isset($_GET['st'])) {
            if ($_GET['st']==1) {
            echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil dirubah.
                            </div><br />';
          } elseif ($_GET['st']==2) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal dirubah.
                            </div><br />';
          } elseif ($_GET['st']==3) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Katasandi lama tidak cocok.
                            </div><br />';
          } elseif ($_GET['st']==4) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Konfirmasi katasandi tidak sama.
                            </div><br />';
          }  elseif ($_GET['st']==5) {
            echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Form tidak boleh kosong
                            </div><br />';
          }
          }
        }
        $notif = 'true';
        $pantau = 0;
        $judul = "Rubah katasandi";
        $halaman = "./view/ubah-katasandi.php";
      } elseif (strcmp($page, "log")==0) {
        ##########################
        # SETTING LOG LAPORAN EMAIL
        ##########################
        function showNotif() {
          if (isset($_GET['st'])) {
            if ($_GET['st']==1) {
                echo '<div class="callout callout-warning" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil disimpan.
                            </div><br />';
            } elseif ($_GET['st']==2) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal menyimpan.
                            </div><br />';
            } elseif ($_GET['st']==3) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Data tidak boleh kosong.
                            </div><br />';
            } elseif ($_GET['st']==4) {
                echo '<div class="callout callout-success" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Berhasil dihapus.
                            </div><br />';
            } elseif ($_GET['st']==5) {
                echo '<div class="callout callout-danger" style="margin-bottom: 0!important;">
                              <h4><i class="fa fa-info"></i> Note:</h4>
                              Gagal dihapus.
                              </div><br />';
              }
          }
          echo '<div class="callout callout-info" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          Agar menghemat penyimpanan Database sangat disarankan untuk menghapus log laporan email ini.
          </div> <br />';
        }
        $notif = 'true';
        if (isset($_GET['id'])) {
          $pantau = 1;
        } else {
          $pantau = 0;
        }
        $judul = "Log Report Monitoring";
        $halaman = "./view/log-report.php";
      }  else {
        ########################
        # SETTING PAGE ERROR
        ########################
        $notif = 'false';
        $pantau = 0;
        $judul = "";
        $halaman = "./view/404.php";
      }
?>
 
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $judul; ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $judul; ?></li>
          </ol>
        </section>

        <section class="content">
  
          <div class="row">
            
            <div class="col-md-9">
            <?php 
              if ($notif == "true") {
                showNotif();
              }
             ?> 
              <div class="nav-tabs-custom">
                <?php include $halaman; ?>
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
            <div class="col-md-3">

              <!-- About Me Box -->
              
                  
                  <?php 
                      if ($pantau!=0) {
                        echo '<div class="box box-primary">
                              <div class="box-header with-border">
                                <h3 class="box-title">Status Jaringan</h3>
                              </div><!-- /.box-header -->
                              <div class="box-body"> <ul>';
                        $ar_status = array("Connected", "Disconnected", "Destination net unreachable", "Destination host unreachable", "Request timed out");
                        $count_ar = count($ar_status) - 1; // array di mulai dari nol jadi hasil count di kurangi 1
                        for ($i=0; $i <= $count_ar ; $i++) { 
                            $status_cl = $ar_status[$i];
                            $sql = "SELECT * FROM client WHERE id_blok='$id_st' AND status_client='$status_cl' ORDER BY id_client ASC";
                            $hitung = $conn->query($sql)->num_rows;
                           
                            
                            echo "<li>$status_cl ( $hitung )</li>";
                        }
                        echo '</ul>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->';
                      }
                  ?> 
                  
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>