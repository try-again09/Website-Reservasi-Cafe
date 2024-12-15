<?php

	 include 'fungsi.php';
	 session_start();

 //AKSI ADD
if(isset($_POST['aksi'])){
	if($_POST['aksi'] == "add"){

		$berhasil = tambah_data($_POST);

		if ($berhasil) {
			$_SESSION['eksekusi']="Berhasil menambahkan data";
			header("location: index.php");
			} else {
				echo $berhasil;
				}
//AKSI EDIT
		} else if ($_POST['aksi'] == "edit") {

			$berhasil = ubah_data($_POST);

        	if ($berhasil) {
        			$_SESSION['eksekusi1']="Berhasil memperbarui data";
			header("location: index.php");
			}else {
				echo $berhasil;
				}
		}
	}
//AKSI DELETE
	if(isset($_GET['mampus'])){
	
	$berhasil = hapus_data($_GET);

		if ($berhasil) {
				$_SESSION['eksekusi2']="Data telah terhapus";
			header("location: index.php");
			} else {
				echo $berhasil;
				}
	}
?>