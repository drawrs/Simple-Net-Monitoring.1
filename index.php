<?php 
####################################################
#
#          Simple Network Monitoring
#      Rizal Khilman - fb.me/rizal.ofdraw
#           codinger-mini.blogspot.com
#
####################################################
    session_start();
    include './lib/db/dbconfig.php';
    //include './lib/db/functions.php';
    date_default_timezone_set('Asia/Jakarta');

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = "home";
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = "id";
    }
    	if (!isset($_SESSION['admin'])) {
    		include './view/login.php';
    	} else {
    		include './view/media.php';
    	}
 ?>