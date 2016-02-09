<?php 
date_default_timezone_set("Asia/Jakarta");
include '../lib/db/dbconfig.php';

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
    $title = "Monitoring : $host";
    $log = "<table cellspacing='2' cellpadding='4'>$message</table> <br />";
     
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'email@gmail.com'; // Email anda disini
    $mail->Password = 'Katasandi'; // Katasandi email anda
    $mail->SMTPSecure = 'tls';
     
    $mail->From = 'email@gmail.com'; // Email disamakan saja
    $mail->FromName = 'Monitoring ITCN3';
    $mail->addAddress('taret@gmail.com', 'Target nama'); // Target email
     
    $mail->addReplyTo('email@gmail.com', 'Monitoring ITCN3'); // isi saja sama seperti email yg anda gunakan untuk mengirim
     
    $mail->WordWrap = 50;
    $mail->isHTML(true);

    $mail->Subject = ''.$title.' - '.date("H.i").' WIB';
    $mail->Body    = "<b>Laporan Monitoring Jaringan</b><br>$log";
    if(!$mail->send()) {
       echo 'Message could not be sent.';
       echo 'Mailer Error: ' . $mail->ErrorInfo;
       exit;
    }
}

    $sql = "SELECT*FROM client ORDER BY id_client ASC";
    $query = $conn->query($sql);
    while ($g=$query->fetch_assoc()) {
        extract($g);
        if ($status_client !== "Connected" && $status_client !== "") {
            $this_day = date("d M Y");
            $hour = date("H");
            $query2 = $conn->query("SELECT*FROM log WHERE id_client='$id_client' AND date_log='$this_day'");
            if ($log=$query2->fetch_assoc()) { // Jika berhasil menemukan data kemudian di jadikan array 
                $h = $log['hour_log'];
                $id_log = $log['id_log'];
                if ($hour - $h > 2) {
                    //Sendmail + Update
                    $sql_log = "UPDATE log SET hour_log=? WHERE id_log='$id_log' AND date_log='$this_day'";
                    if($stmt = $conn->prepare($sql_log)){ // Update Hour
                        $stmt->bind_param("s", $hour);
                        $stmt->execute();
                        //sendMail(); // sendmail
                        sendMail($g);
                        //echo "Sukses kirim email";
                        //echo "<hr>";
                    }
                }
            } else {
                //Send mail + input
                $sql_log = "INSERT INTO log (id_client, date_log, hour_log) VALUES (?, ?, ?)";
                if ($stmt = $conn->prepare($sql_log)) { //Insert date
                    $stmt -> bind_param("iss", $id_client, $this_day, $hour);
                    $stmt->execute();
                    sendMail($g);
                    //echo "Send mail";
                }
            }

        }
    }
    
    ?> 