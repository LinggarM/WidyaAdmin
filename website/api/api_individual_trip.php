<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$id_customer = $_POST['id_customer'];
	$rute = $_POST['rute'];
	$dari_semarang = $_POST['dari_semarang'];
	$harga = $_POST['harga'];
	$kota_jemput = $_POST['kota_jemput'];
	$lokasi_jemput = $_POST['lokasi_jemput'];
	$kota_tujuan = $_POST['kota_tujuan'];
	$tanggal = $_POST['tanggal'];
	$waktu_berangkat = $_POST['waktu'];
	$jumlah_orang = $_POST['jumlah_orang'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    
	// cek apakah ada seat
    $query = " SELECT * FROM drivers, mobil WHERE drivers.id_driver = mobil.id_driver AND mobil.rute = '$rute' AND mobil.waktu_berangkat = '$waktu_berangkat' AND mobil.dari_semarang = '$dari_semarang' AND mobil.tersedia >= '$jumlah_orang' ";
    $result_query = mysqli_query($db, $query);

    if ($result_query) {
        while ($row = mysqli_fetch_array($result_query)){
            $id_driver = $row['id_driver'];
        }
        
        // jika ada, maka insert transaksi
        $query_insert = " INSERT INTO transaksi_individu VALUES (NULL, '$id_driver', '$id_customer', '$kota_jemput', '$lokasi_jemput', '$kota_tujuan', '$tanggal', '$waktu_berangkat', '$harga', '$jumlah_orang', '1', '0') ";

        // kurangi tersedia dengan jumlah seat
        $query_update = " UPDATE mobil SET tersedia = tersedia - 1 WHERE id_mobil = '$id_driver' ";
        
        if (mysqli_query($db, $query_insert)){
            if (mysqli_query($db, $query_update)) {
        		$result["success"] = "1";
        		$result["message"] = "success";
        		
        		echo json_encode($result);
            }
        }
    		mysqli_close($db);
	} else {
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($db);
	}
}

?>