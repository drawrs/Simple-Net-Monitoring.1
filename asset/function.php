<?php 
require 'PHPMailer/PHPMailerAutoload.php';
function sendMail($x) {     
    $mail = new PHPMailer;
    $ip = $x['ip_client'];
    $host = $x['name_client'];
    $status = $x['status_client'];
    switch ($status) {
        case 'Disconnected':
            $color = "#D9534F";
            break;
        case 'Destination host unreachable':
            $color = "#5CB85C";
            break;
        case 'Destination net unreachable':
            $color = "#5CB85C";
            break;
        case 'Request timed out':
            $color = "#5CB85C";
            break;
        default:
            $color = "#D9534F";
            break;
    }
    $message = "<tr><td>IP</td><td>:</td><td><strong>$ip</strong></td></tr>
                <tr><td>HOST</td><td>:</td><td><strong>$host</strong></td></tr>
                <tr><td>STATUS</td><td>:</td><td><strong><font color='$color'>$status</font></strong></td></tr>";
    //echo "Laporan Monitoring";
    $title = "Tes";
    $log = "<table cellspacing='2' cellpadding='4'>$message</table> <br />";
     
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'monitoring.itcn3@gmail.com';
    $mail->Password = 'th3Phoenix';
    $mail->SMTPSecure = 'tls';
     
    $mail->From = 'monitoring.itcn3@gmail.com';
    $mail->FromName = 'Monitoring ITCN3';
    $mail->addAddress('rizal.drawrs@gmail.com', 'Rizal');
     
    $mail->addReplyTo('monitoring.itcn3@gmail.com', 'Monitoring ITCN3');
     
    $mail->WordWrap = 50;
    $mail->isHTML(true);

    $mail->Subject = 'Report : '.$title.'';
    $mail->Body    = "<b>Laporan Monitoring Jaringan PT.KAI</b><br>$log";
    if(!$mail->send()) {
       echo 'Message could not be sent.';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       exit;
    }
}
function routeUrl(){
    if (strcmp($page, "home")==0) {
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
        $aktif = 1;
        $pantau = 1;
        $notif = 'true';
        $judul = "IT3CN";
        $halaman = "./view/beranda.php";
      } elseif (strcmp($page, "client")==0) {
        $aktif = 1;
        $notif = 'false';
        $pantau = 0;
        $judul = "Client";
        $halaman = "./view/client.php";
      } elseif (strcmp($page, "add_client")==0) {
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
        $aktif = 1;
        $notif = 'true';
        $pantau = 0;
        $judul = "Tambah Client";
        $halaman = "./view/add_client.php";
      } elseif (strcmp($page, "add_stasiun")==0) {
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
        $aktif = 1;
        $notif = 'true';
        $pantau = 0;
        $judul = "Tambah stasiun";
        $halaman = "./view/add_stasiun.php";
      } elseif (strcmp($page, "stasiun")==0) {
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
        $aktif = 1;
        $notif = 'true';
        if (isset($_GET['id'])) {
          $pantau = 1;
        } else {
          $pantau = 0;
        }
        $judul = "Monitoring";
        $halaman = "./view/stasiun.php";
      }  elseif (strcmp($page, "log")==0) {
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
        $aktif = 1;
        $notif = 'true';
        if (isset($_GET['id'])) {
          $pantau = 1;
        } else {
          $pantau = 0;
        }
        $judul = "Log Report Monitoring";
        $halaman = "./view/log-report.php";
      }  else {
        $aktif = 0;
        $notif = 'false';
        $pantau = 0;
        $judul = "";
        $halaman = "./view/404.php";
      }
}
?>