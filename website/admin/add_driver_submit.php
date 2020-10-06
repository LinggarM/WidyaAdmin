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
        $platno = test_input($_POST['platno']);
        if ($platno == ''){
            $valid_platno = FALSE;
        } else {
            $valid_platno = TRUE;
        }
        $rute = test_input($_POST['rute']);
        if ($rute == ''){
            $valid_rute = FALSE;
        } else {
            $valid_rute = TRUE;
        }
        $waktu_berangkat = test_input($_POST['waktu_berangkat']);
        if ($waktu_berangkat == ''){
            $valid_waktu_berangkat = FALSE;
        } else {
            $valid_waktu_berangkat = TRUE;
        }
        $berangkat_dari_semarang = test_input($_POST['berangkat_dari_semarang']);
        if ($berangkat_dari_semarang == ''){
            $valid_berangkat_dari_semarang = FALSE;
        } else {
            $valid_berangkat_dari_semarang = TRUE;
        }
        //insert data into database
        if ($valid_name && $valid_nohp && $valid_email && $valid_password && $valid_platno && $valid_rute && $valid_waktu_berangkat && $valid_berangkat_dari_semarang){
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
            $platno = $db->real_escape_string($platno);
            $rute = $db->real_escape_string($rute);
            $waktu_berangkat = $db->real_escape_string($waktu_berangkat);
            $berangkat_dari_semarang = $db->real_escape_string($berangkat_dari_semarang);
            //get biggest id
            $result = mysqli_query($db, "SELECT MAX(id_driver) FROM drivers");
            $data = mysqli_fetch_array($result);
            $id = $data['MAX(id_driver)'];
            $id_new = $id;
            $id_new++;
            //Asign a query
            $query_driver = " INSERT INTO drivers VALUES('$id_new','$name', '$no_hp', '$email', '$password', 'NULL','$id_new') ";
            $query_mobil = " INSERT INTO mobil VALUES('$id_new','$platno', '$id_new', '10', '10', '$rute','$waktu_berangkat','$berangkat_dari_semarang') ";
            // Execute the query
            $result_driver = $db->query( $query_driver );
            $result_mobil = $db->query( $query_mobil );
            if (!($result_driver && $result_mobil)){
                die ("Could not query the database: <br />". $db->error);
            }else{
                echo '1 record added. <a href="driver.php">Back to drivers data</a><br />';
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