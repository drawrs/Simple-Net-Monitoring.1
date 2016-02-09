<?php 
####################################################
#
#          Simple Network Monitoring
#      Rizal Khilman - fb.me/rizal.ofdraw
#           codinger-mini.blogspot.com
#
####################################################
$query_us = $conn->query("SELECT*FROM user WHERE id_user='$_SESSION[id]'");
$admin = $query_us->fetch_assoc();
$admin_name = $admin['name_user'];
 ?>
<!-- Logo -->
        <a href="home" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DAOP</b>3</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Network</b> Monitoring</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="asset/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $admin_name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $admin_name; ?> - Web Developer
                      <small>PT.KERETA API INDONESIA</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="katasandi" class="btn btn-default btn-flat">Ubah Katasandi</a>
                    </div>
                    <div class="pull-right">
                      <a href="asset/proses.php?logout" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>