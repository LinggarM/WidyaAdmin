<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$nama = $_POST['nama'];
	$noHp = $_POST['noHp'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
	
    $query = " INSERT INTO customers (nama_customer, no_hp, email, password, alamat) VALUES ('$nama','$noHp','$email','$password','$alamat') ";
    
    if (mysqli_query($db, $query)){
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