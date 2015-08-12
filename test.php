 <?php   
    $sql_host = "localhost";
    $sql_username = "root";
    $sql_password = "";
    $sql_database = "myDB";

    include "system/functions.php";



    $conn = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected!!";
    }
?>

<form action="test.php" method="post">
    <input type="text" name="firstname">
    <input type="text" name="lastname">
    <input type="text" name="age">
    <input type="submit" name="submit">


</form>

<?php

if(isset($_POST['submit']) && checkPost($_POST['firstname']) && checkPost($_POST['lastname']) && checkPost($_POST['age'])){
    
    
    //PREPARE AND BIND
    $stmt = $conn->prepare("INSERT INTO test (firstname, lastname, age) VALUES(?,?,?)");
    $stmt->bind_param("ssi", $firstname, $lastname, $age);
    
    //Set parameters and execute
        
            
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $stmt->execute();
        
        echo "New records created successfully";
        $stmt->close();
        $conn->close();
  
        echo "Special characters NOT allowed";
    
} else {
    
}


?>