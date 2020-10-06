<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once '../db_login.php';
    // Connect
    $db = new mysqli($db_host, $db_username, $db_password,$db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    $query = " SELECT * FROM customers WHERE email = '$email' ";
    
    $response = $db->query( $query );
    if (!$response){
        die ("Could not query the database: <br />". $db->error);
    }
    
    $result = array();
    $result['login'] = array();
    
    if (mysqli_num_rows($response) == 1) {
        
        $row = mysqli_fetch_assoc($response);
        
        if ($password == $row['password']) {
            
            $index['id_customer'] = $row['id_customer'];
            $index['nama_customer'] = $row['nama_customer'];
            $index['no_hp'] = $row['no_hp'];
            $index['alamat'] = $row['alamat'];
            $index['foto_profil'] = $row['foto_profil'];
            
            array_push($result['login'], $index);
            
            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);
            
            mysqli_close($db);
        } else {
            
            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);
            
            mysqli_close($db);
        }
    } else {
		$result['success'] = "0";
		$result['message'] = "error";
		echo json_encode($result);
		
		mysqli_close($db);
	}
}

?>