<?php
session_start();
include '../lib/db/dbconfig.php';
if (isset($_POST['login'])) {

	if (empty($_POST['email'])  || empty($_POST['pwd'])) {
		echo "<script>alert('Kolom tidak boleh kosong!'); window.location=('../home');</script>";
	} else {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = sha1(mysqli_escape_string($conn, $_POST['pwd']));

		$sql = "SELECT * FROM user WHERE email_user='$email' AND pwd_user='$pwd'";
		$query = $conn->query($sql);
		$hitung = $query->num_rows;
		
		if ($hitung!==0) {
			$ambil = $query->fetch_assoc();
			extract($ambil);
			$_SESSION['admin'] = "$email";
			$_SESSION['id'] = "$id_user";
			header("location:../home");
		}else{
			header("location:../home&log=2");
		}
	}
} elseif (isset($_GET['logout'])) {
	session_destroy();
	header("location:../home");
}
elseif (isset($_SESSION['admin'])) {
	// Tambahh stasiun
	if (isset($_POST['add_stasiun'])) {
		$stasiun = mysqli_real_escape_string($conn, $_POST['name_st']);
		$kd_telp = mysqli_real_escape_string($conn, $_POST['kd_telp_st']);
		$telp = mysqli_real_escape_string($conn, $_POST['telp_st']);
		//$telp = "($kd_telp) $no_telp";
		$add = mysqli_real_escape_string($conn, $_POST['add_st']);
		$pusat = 0;
		$id = "NULL";
		if (!empty($stasiun) || !empty($kd_telp) || !empty($no_telp) || !empty($add)) {
			$q_cek = $conn->query("SELECT*FROM blok WHERE name_blok='$stasiun'");
			if ($q_cek->num_rows!=0) { // Cek ada nama stasiun yg sama ga
				echo "<script>window.alert('Sudah ada Stasiun dengan nama \"$stasiun\"');
						window.location=('../add_stasiun');</script>"; // aksi ada
			} else {
				// aksi ga ada
				$sql = "INSERT INTO blok (id_blok, name_blok, telp_blok, add_blok, pusat_client) VALUES (?, ?, ?, ?, ?)";
				if ($statement = $conn->prepare($sql)) {
					$statement->bind_param(
						"isssi", $id, $stasiun, $telp, $add, $pusat);
					if ($statement->execute()) {
						header("location:../add_stasiun&st=1");
					} else {
						header("location:../add_stasiun&st=2");
					}
				} else {
					header("location:../add_stasiun&st=2");
				}
			}
		} else {
			header("location:../add_stasiun&st=3");
		}
	}
	// Tambah client
	elseif (isset($_POST['add_client'])) {
		$id = "NULL";
		$ip = mysqli_real_escape_string($conn, $_POST['ip']);
		$name = mysqli_real_escape_string($conn, $_POST['client']);
		$blok = mysqli_real_escape_string($conn, $_POST['stasiun']);
		if (!empty($ip) || !empty($name) || !empty($blok)) {
			$sql = "INSERT INTO client (id_client,
				id_blok,
				ip_client,
				name_client) VALUES (?, ?, ?, ?)";
			if ($statement = $conn->prepare($sql)) {
				$statement->bind_param(
					"iiss", $id, $blok, $ip, $name);
				if ($statement->execute()) {
					header("location:../add_client&st=1");
				} else {
					header("location:../add_client&st=2");
				}
			} else {
				header("location:../add_client&st=2");
			}
		} else {
			header("location:../add_client&st=3");
		}
	}
	// Edit Client
	elseif (isset($_POST['edit_client'])) {
		$id_client = mysqli_real_escape_string($conn, $_POST['id_client']);
		$ip = mysqli_real_escape_string($conn, $_POST['ip']);
		$name = mysqli_real_escape_string($conn, $_POST['client']);
		$blok = mysqli_real_escape_string($conn, $_POST['stasiun']);
		if (!empty($ip) || !empty($name) || !empty($blok)) {
			$sql = "UPDATE client SET ip_client=?, name_client=?, id_blok=? WHERE id_client='$id_client'";
			if ($statement = $conn->prepare($sql)) {
				$statement->bind_param(
					"sss", $ip, $name, $blok);
				if ($statement->execute()) {
					header("location:../stasiun&id=$blok&st=1");
				} else {
					header("location:../stasiun&id=$blok&st=2");
				}
			} else {
				header("location:../stasiun&st=2");
			}
		} else {
			header("location:../stasiun&st=3");
		}
	}
	// Delete Client
	elseif (isset($_POST['del_cln'])) {
		$id_client = mysqli_real_escape_string($conn, $_POST['id_client']);
		$id_blok = mysqli_real_escape_string($conn, $_POST['id_blok']);
		$sql = "DELETE FROM client WHERE id_client=?";
		$delete = $conn->prepare($sql);
		$delete->bind_param("i", $id_client);
		if ($delete->execute()) {
			header("location:../stasiun&id=$id_blok&st=4");
		} else {
			header("location:../stasiun&id=$id_blok&st=5");
		}
	}
	// Edit Stasiun
	elseif (isset($_POST['edit_stasiun'])) {
		$id_st = mysqli_real_escape_string($conn, $_POST['id_st']);
        $stasiun = mysqli_real_escape_string($conn, $_POST['name_st']);
        $kd_telp = mysqli_real_escape_string($conn, $_POST['kd_telp_st']);
        $telp = mysqli_real_escape_string($conn, $_POST['telp_st']);
        $add = mysqli_real_escape_string($conn, $_POST['add_st']);
        if (!empty($stasiun) || !empty($kd_telp) || !empty($no_telp) || !empty($add) || !empty($id_st)) {
            $sql = "UPDATE blok SET name_blok=?,telp_blok=?, add_blok=? WHERE id_blok='$id_st'";
            if ($statement = $conn->prepare($sql)) {
                $statement->bind_param(
                    "sss", $stasiun, $telp, $add);
                if ($statement->execute()) {
                    header("location:../stasiun&id=$id_st&st=1");
                } else {
                    header("location:../stasiun&id=$id_st&st=2");
                }
            } else {
                header("location:../stasiun&st=2");
            }
        } else {
            header("location:../stasiun&st=3");
        }
        $conn->close();
    }  
    //Delete Stasiun dan semua isi client
    elseif (isset($_GET['del_st'])) {
		$id_blok = mysqli_real_escape_string($conn, $_GET['del_st']);
		$sql_blok = "DELETE FROM blok WHERE id_blok=?";
		$sql_cln = "DELETE FROM client WHERE id_blok=?";
		// Eksekusi blok
		$del_blok = $conn->prepare($sql_blok);
		$del_blok->bind_param("i", $id_blok);
		// Eksekusi client
		$del_cln = $conn->prepare($sql_cln);
		$del_cln->bind_param("i", $id_blok);
		if ($del_blok->execute() && $del_cln->execute()) {
			header("location:../stasiun&st=4");
		} else {
			header("location:../stasiun&st=5");
		}
	}
	// Del log
	elseif (isset($_GET['del_log'])) {
		if (!empty($_POST['id_log'])) {
			$count_id = count($_POST["id_log"]);
			for($i=0; $i < $count_id; $i++) 
			{	
				$id_log = $_POST['id_log'][$i];
			    $sql_log = "DELETE FROM log WHERE id_log='$id_log'";
			    
			    if ($stmt = $conn->prepare($sql_log)) {
			    	if ($stmt->execute()) {
			    		header("location:../log&st=4");
			    	} else {
			    		header("location:../log&st=5");
			    	}
			    }
			}
		} else {
			header("location:../log&st=3");
		}
	}
   //  Menjadikan Stasiun default
	elseif (isset($_GET['make_pusat'])) {
		$id_st = mysqli_real_escape_string($conn, $_GET['make_pusat']);
		$sql_p1 = "UPDATE blok SET pusat_client=?";
		$sql_p2 = "UPDATE blok SET pusat_client=? WHERE id_blok='$id_st'";
		if ($pre1 = $conn->prepare($sql_p1)) {
			$n1 = "0";
			$n2 = "1";
			$pre1->bind_param("s", $n1);
			if ($pre1->execute()) {
				if ($pre2 = $conn->prepare($sql_p2)) {
					$pre2->bind_param("s", $n2);
					$pre2->execute();
					header("location:../stasiun&st=1");
				}
			} else {
				header("location:../stasiun&st=2");
			}
		} else {
			header("location:../stasiun&st=2");
		}
	}
	//ubah katasandi
	elseif (isset($_GET['change-pwd'])) {
		$old = mysqli_real_escape_string($conn, $_POST['old-pwd']);
		$new = mysqli_real_escape_string($conn, $_POST['new-pwd']);
		$cek = mysqli_real_escape_string($conn, $_POST['cek-new-pwd']);
		$sql = "SELECT*FROM user WHERE id_user='$_SESSION[id]'";
		$query = $conn->query($sql);
		$get = $query->fetch_assoc();
		if (!empty($old) && !empty($new) && !empty($cek)) {
			if ($get['pwd_user'] !== sha1($old)) {
				header("location:../katasandi&st=3");
			} else {
				if ($new !== "$cek") {
					header("location: ../katasandi&st=4");
				} else {
					$sql_in = "UPDATE user SET pwd_user = ? WHERE id_user='$_SESSION[id]'";
					if ($stmt = $conn->prepare($sql_in)) {
						$pwd_true = sha1($new);
						$stmt->bind_param("s", $pwd_true);
						if ($stmt->execute()) {
							header("location:../katasandi&st=1");
						} else {
							header("location:../katasandi&st=2");
						}
					} else {
						header("location:../katasandi&st=2");
					}
				}
			}
		} else {
			header("location:../katasandi&st=5");
		}
	}
	 
}
else {
	echo "<script>alert('Wah ! nakal ya..'); window.location=('../home');</script>";
}
?>