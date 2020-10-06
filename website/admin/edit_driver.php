<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Driver</title>
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
$query = " SELECT * FROM drivers WHERE id_driver=".$id." ";
// Execute the query
$result = $db->query( $query );
if (!$result){
    die ("Could not query the database: <br />". $db->error);
} else {
    while ($row = $result->fetch_object()){
        $nama = $row->nama_driver;
        $no_hp = $row->no_hp;
        $email = $row->email;  
        $password = $row->password;
    }
}
$query = " SELECT * FROM mobil WHERE id_mobil=".$id." ";
// Execute the query
$result = $db->query( $query );
if (!$result){
    die ("Could not query the database: <br />". $db->error);
} else {
    while ($row = $result->fetch_object()){
        $plat_no = $row->plat_no;
        $rute = $row->rute;
        $waktu_berangkat = $row->waktu_berangkat;           
        $dari_semarang = $row->dari_semarang;
    }
}
?>
    <div class="login-form">
    <form name="formlogin" method="post" action="edit_driver_submit.php">
        <h2 class="text-center">Add Driver</h2>
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
            <input type="text" name="platno" class="form-control" placeholder="Plat No" value="<?php echo $plat_no;?>"/>
        </div>
        <div class="form-group">
            Rute :
            <select name="rute">
            <?php
                // Include our login information
                require_once('db_login.php');

                // Connect
                $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
                if (mysqli_connect_errno()){
                    die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                }
                $query = " SELECT * FROM rute ";

                // Execute the query
                $result = mysqli_query($con,$query);
                if (!$result){  
                    die ("Could not query the database: <br />". mysqli_error($con));
                }
                // Fetch and display the results
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['id_rute'].'"'; if ($row['id_rute']==$rute) {echo 'selected="selected"';} echo '>'.$row['nama_rute'].'</option>';  
                }
                mysqli_close($con);
            ?>
            </select>
        </div>
        <div class="form-group">
            Waktu Berangkat :
            <select name="waktu_berangkat">
            <?php
                // Include our login information
                require_once('db_login.php');

                // Connect
                $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
                if (mysqli_connect_errno()){
                    die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                }
                $query = " SELECT * FROM waktu_berangkat ";

                // Execute the query
                $result = mysqli_query($con,$query);
                if (!$result){  
                    die ("Could not query the database: <br />". mysqli_error($con));
                }
                // Fetch and display the results
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['id_waktu_berangkat'].'"'; if ($row['id_waktu_berangkat']==$waktu_berangkat) {echo 'selected="selected"';} echo '>'.$row['nama_waktu_berangkat'].'</option>';  
                }
                mysqli_close($con);
            ?>
            </select>
        </div>
        <div class="form-group">
            Berangkat dari Semarang :
            <select name="berangkat_dari_semarang">
                <option value="1" <?php if ($dari_semarang == 1) {echo 'selected="selected"';} ?>>Ya</option>
                <option value="2" <?php if ($dari_semarang == 2) {echo 'selected="selected"';} ?>>Tidak</option>
            </select>
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