<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$id_customer = $_POST['id_customer'];
	$harga = $_POST['harga'];
	$kota_pinjam = $_POST['kota_pinjam'];
	$lokasi_pinjam = $_POST['lokasi_pinjam'];
	$tanggal = $_POST['tanggal'];
	$waktu_berangkat = $_POST['waktu_berangkat'];
	$lama_pinjam = $_POST['lama_pinjam'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    
	// cek apakah ada driver
    $query = " SELECT * FROM mobil WHERE mobil.rute = '6' AND mobil.tersedia = '1' ";
    $result_query = mysqli_query($db, $query);

    if ($result_query) {
        while ($row = mysqli_fetch_array($result_query)){
            $id_mobil = $row['id_mobil'];
        }
        
        // jika ada, maka insert transaksi
        $query_insert = " INSERT INTO transaksi_rental VALUES (NULL, '$id_mobil', '$id_customer', '$kota_pinjam', '$lokasi_pinjam', '$tanggal', '$waktu_berangkat', '$lama_pinjam', '$harga', '1', '0') ";

        // kurangi tersedia dengan jumlah seat
        $query_update = " UPDATE mobil SET tersedia = '0' WHERE id_mobil = '$id_mobil' ";
        
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