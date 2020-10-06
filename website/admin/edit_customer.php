<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Customer</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
    </head>
<body>
<?php
$id = $_GET['id'];
// connect database
require_once('db_login.php');
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){
    die ("Could not connect to the database: <br />". $db->connect_error);
}
$query = " SELECT * FROM customers WHERE id_customer=".$id." ";
// Execute the query
$result = $db->query( $query );
if (!$result){
    die ("Could not query the database: <br />". $db->error);
} else {
    while ($row = $result->fetch_object()){
        $nama = $row->nama_customer;
        $no_hp = $row->no_hp;
        $email = $row->email;  
        $password = $row->password;           
        $alamat = $row->alamat;
    }
}
?>
    <div class="login-form">
    <form name="formlogin" method="post" action="edit_customer_submit.php">
        <h2 class="text-center">Add Customer</h2>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $nama;?>">
        </div>
        <div class="form-group">
            <input type="text" name="nohp" class="form-control" placeholder="No HP" value="<?php echo $no_hp;?>"/>
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email;?>"/>
        </div>
        <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password;?>"/>
        </div>
        <div class="form-group">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat;?>"/>
        </div>
        <!-- <div class="form-group">
            <label for="userfile">Upload profile photo (File allowed : jpg, jpeg, png or gif) :</label>
            <input type="file" name="userfile" id="userfile"/>
        </div> -->
        <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-primary btn-block">Submit</button>
        </div>     
    </form>
    </div>
</body>
</html>