<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
	$id = $_POST['id'];
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
	
    $query = " UPDATE customers SET nama_customer = '$nama', no_hp = '$noHp', email = '$email', password = '$password', alamat = '$alamat' WHERE id_customer = '$id' ";
    
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