<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$kode_transaksi = $_POST['kode_transaksi'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
	
    $query = " UPDATE transaksi_rental SET status_transaksi = '4' WHERE transaksi_rental.kode_transaksi = '$kode_transaksi' ";
    $query_id_driver = "SELECT id_driver FROM transaksi_rental WHERE transaksi_rental.kode_transaksi = '$kode_transaksi'" ;
    $row = mysqli_fetch_array(mysqli_query($db, $query_id_driver));
    $id_driver = $row['id_driver'];
    $query_mobil = " UPDATE mobil SET tersedia = 1 WHERE mobil.id_driver = '$id_driver'";
    
    if (mysqli_query($db, $query)){
        if (mysqli_query($db, $query_mobil)) {
    		$result["success"] = "1";
    		$result["message"] = "success";
		    echo json_encode($result);
		    mysqli_close($db);
        }
	} else {
		$result["success"] = "0";
		$result["message"] = "error";
		
		echo json_encode($result);
		mysqli_close($db);
	}
}

?>