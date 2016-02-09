<?php 
$d_blokx=$conn->query("SELECT (name_blok) FROM blok WHERE pusat_client='1'")->fetch_assoc();
$nama_blok = $d_blokx['name_blok']; // Id Kantor Daop 3
 ?>
<ul class="sidebar-menu">
   <li>
    <a href="home">
    <i class="fa fa-subway"></i> <span><?php echo $nama_blok; ?></span> 
    </a>
  </li>
  <li>
    <a href="stasiun">
    <i class="fa fa-list"></i> <span>List Stasiun</span> 
    </a>
  </li>
  <li class="active treeview">
    <a href="#">
      <i class="fa fa-sitemap"></i> <span>Monitoring</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <?php

            if ($conn->query("SELECT*FROM client")->num_rows!==0) {
                $query_blok=$conn->query("SELECT*FROM blok ORDER BY id_blok ASC");
                while ($blok=$query_blok->fetch_assoc()) {
                  extract($blok);
                  $q_client=$conn->query("SELECT*FROM client NATURAL LEFT JOIN blok WHERE id_blok='$id_blok'");
                  $cek = $q_client->num_rows;
                  if ($cek!==0) {
                    echo "<li>
                            <a href='./stasiun&id=$id_blok'><span class='fa fa-train'></span> $name_blok</a>
                            </li>";
                            //tidak terpakais
                  }
                }
            } else {
                echo "Belum ada data";
            }
        ?>
    </ul>
  </li>
   <li class="treeview">
    <a href="#">
    <i class="fa fa-wrench"></i>
    <span>Pengaturan</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
    <li>
        <a class="active" href="./log">Log Laporan Email</a>
    </li>
    <li>
        <a class="active" href="./add_client">Add Client</a>
    </li>
    <li>
        <a class="active" href="./add_stasiun">Add Stasiun</a>
    </li>
    <li>
        <a href="./asset/proses.php?logout">Logout</a>
    </li>
    
    </ul>
  </li>
</ul>
