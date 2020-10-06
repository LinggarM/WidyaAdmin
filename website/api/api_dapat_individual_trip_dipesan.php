<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$id_customer = $_POST['id_customer'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    
	// cek apakah ada seat
    $query = " SELECT * FROM transaksi_individu, drivers, waktu_berangkat WHERE transaksi_individu.id_driver = drivers.id_driver AND id_customer = '$id_customer' AND waktu_berangkat.id_waktu_berangkat = transaksi_individu.waktu_penjemputan AND status_transaksi = '1' ";
    $result_query = mysqli_query($db, $query);
    $result = array();
	$result['order'] = array();

    if ($result_query) {
        while ($row = mysqli_fetch_array($result_query)){
			$kode_now = $row['kode_transaksi'];
            
            $index['kode_transaksi'] = $row['kode_transaksi'];
            $index['nama_driver'] = $row['nama_driver'];
            $index['kota_penjemputan'] = $row['kota_penjemputan'];
            $index['lokasi_penjemputan'] = $row['lokasi_penjemputan'];
            $index['kota_tujuan'] = $row['kota_tujuan'];
            $index['tanggal_penjemputan'] = $row['tanggal_penjemputan'];
            $index['waktu_penjemputan'] = $row['nama_waktu_berangkat'];
            $index['harga'] = $row['harga'];
            $index['jumlah_orang'] = $row['jumlah_orang'];
            
            array_push($result['order'], $index);
        }
		$result["success"] = "1";
		$result["message"] = "success";
		
		echo json_encode($result);
		mysqli_close($db);
	} else {
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($db);
	}
}

?>