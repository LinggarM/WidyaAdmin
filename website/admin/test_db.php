<html>
    <body>
            <?php
              // Include our login information
              require_once('db_login.php');
  
              // Connect
              $con = mysqli_connect($db_host, $db_username, $db_password, $db_database);
              if (mysqli_connect_errno()){
                  die ("Could not connect to the database: <br />". mysqli_connect_error( ));
              }
              $result = mysqli_query($con, "SELECT MAX(id_driver) FROM drivers");
              $data = mysqli_fetch_array($result);
              $id = $data['MAX(id_driver)'];
              $id_new = $id;
              $id_new++;
              echo $id_new;
              mysqli_close($con);
            ?>
    </body>
</html>