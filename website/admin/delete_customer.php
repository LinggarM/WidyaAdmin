<?php
    $id = $_GET['id'];
    // connect database
    require_once('db_login.php');
    $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    if ($db->connect_errno){
        die ("Could not connect to the database: <br />". $db->connect_error);
    }
    $query = " DELETE FROM customers WHERE id_customer=".$id." ";
    // Execute the query
    $result = $db->query( $query );
    if (!$result){
        die ("Could not query the database: <br />". $db->error);
    }else{
        echo 'Data has been deleted.<br /><br />';
        echo '<a href="index.php">Back to customers data</a>';
        $db->close();
        exit;
    }
    $db->close();
?>