<?php
    $sql_host = "localhost";
    $sql_username = "root";
    $sql_password = "";
    $sql_database = "myDB";

/* $sql_host = "localhost";
    $sql_username = "hcvudnmp";
    $sql_password = "Kolfiberkatt88";
    $sql_database = "hcvudnmp_myDB";
    För servern*/ 

    $conn = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    //echo 'Connected';
    

?>