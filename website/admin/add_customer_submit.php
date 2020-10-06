
    <?php
        $name = test_input($_POST['nama']);
        if ($name == ''){
            $valid_name = FALSE;
        } else {
            $valid_name = TRUE;
        }
        $no_hp = test_input($_POST['nohp']);
        if ($no_hp == ''){
            $valid_nohp = FALSE;
        } else {
            $valid_nohp = TRUE;
        }
        $email = test_input($_POST['email']);
        if ($email == ''){
            $valid_email = FALSE;
        } else {
            $valid_email = TRUE;
        }
        $password = test_input($_POST['password']);
        if ($password == ''){
            $valid_password = FALSE;
        } else {
            $valid_password = TRUE;
        }
        $address = test_input($_POST['alamat']);
        if ($address == ''){
            $valid_address = FALSE;
        } else {
            $valid_address = TRUE;
        }
        //insert data into database
        if ($valid_name && $valid_nohp && $valid_email && $valid_password && $valid_address){
            // Include our login information
            require_once('db_login.php');
            // Connect
            $db = new mysqli($db_host, $db_username, $db_password,$db_database);
            if ($db->connect_errno){
                die ("Could not connect to the database: <br />". $db->connect_error);
            }
            //escape input data
            $name = $db->real_escape_string($name);
            $no_hp = $db->real_escape_string($no_hp);
            $email = $db->real_escape_string($email);
            $password = $db->real_escape_string($password);
            $address = $db->real_escape_string($address);
            //Asign a query
            $query = " INSERT INTO customers (nama_customer, no_hp, email, password, alamat) VALUES ('$name','$no_hp','$email','$password','$address') ";
            // Execute the query
            $result = $db->query( $query );
            if (!$result){
                die ("Could not query the database: <br />". $db->error);
            }else{
                echo '1 record added. <a href="index.php">Back to customers data</a><br />';
            }
            //close db connection
            mysqli_close($db);
        }
        //kode untuk validasi field lainnya ....
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>