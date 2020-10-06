<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$kode_transaksi = $_POST['kode_transaksi'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
	
    $query = " SELECT * FROM transaksi_individu, mobil WHERE transaksi_individu.kode_transaksi = '$kode_transaksi' AND mobil.id_driver = transaksi_individu.id_driver ";
    
    if (mysqli_query($db, $query)){
        $row = mysqli_fetch_array(mysqli_query($db, $query));
        
		$result["success"] = "1";
		$result["plat_no"] = $row['plat_no'];
		
		echo json_encode($result);
		mysqli_close($db);
	} else {
		$result["success"] = "0";
		$result["plat_no"] = "error";
		
		echo json_encode($result);
		mysqli_close($db);
	}
}

?>