<?php
	include 'koneksi.php';

	function tambah_data($data){

		$costumer_id=$data['costumer_id'];
		$reservation_date=$data['reservation_date'];
		$reservation_time=$data['reservation_time'];
		$notes=$data['notes'];
		$alamat=$data['alamat'];

		$query = "INSERT INTO tb_reservasi VALUES(null, '$costumer_id', '$reservation_date', '$reservation_time','$notes', '$alamat')";
		$sql = mysqli_query($GLOBALS['conn'],$query);

		return true;
	}

	function ubah_data($data){
		$id=$data['id'];
		$costumer_id=$data['costumer_id'];
		$reservation_date=$data['reservation_date'];
		$reservation_time=$data['reservation_time'];
		$notes=$data['notes'];
		$alamat=$data['alamat'];

		$query = "UPDATE tb_reservasi SET costumer_id='$costumer_id', reservation_date='$reservation_date', reservation_time='$reservation_time', notes='$notes', alamat='$alamat' WHERE id='$id'";
        	$sql = mysqli_query($GLOBALS['conn'],$query);

        return true;

	}

	function hapus_data($data){
			$id = $data['mampus'];
			$query = "DELETE FROM tb_reservasi WHERE id = '$id';";
			$sql = mysqli_query($GLOBALS['conn'], $query);
		
		return true;
	}

?>