<?php 
	session_start();
	require_once('db_login.php');
	$con = mysqli_connect($db_host, $db_username, $db_password, $db_database);

	$email = $_POST['email'];
	$password = $_POST['password'];
	$login = mysqli_query($con,"SELECT * FROM admin WHERE email='$email' AND password ='$password'");
	$cek = mysqli_num_rows($login);
	if($cek > 0){
		$data = mysqli_fetch_assoc($login);
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo '<meta http-equiv = "refresh" content = "2; url = index.php" />';
	} else {
		header("location:login.php?pesan=gagal");
	}
?>