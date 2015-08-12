<?php
    include 'system/header.php';
    $img = $_GET['p'];
    $imgRemove = "uploads/" . $img;
    $sql = "DELETE FROM pics WHERE fileName = '$img'";
    $result = $conn->query($sql);


    if($result){
        echo "<h1>Deleted successfully!<h1>";
        unlink($imgRemove);
        header('Location: profile.php');
    } else {
        echo "Something went wrong";
        header('Location: profile.php');
    }
?>
