<?php
function checkNumPosts($username){
    global $conn;
    $sql = "SELECT COUNT('byUser') AS num FROM pics WHERE byUser = '$username'";
    $result = $conn->query($sql);
    if($result){
        while($row = $result->fetch_assoc()){
           $numPosts = $row['num'];
        }
    }
    return $numPosts;

}

function checkInputs($string){
     if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)){
        return 0;
    } else {
        return 1;
    }
}

function checkPost($post){
    if(isset($post) && !empty($post) && checkInputs($post)){
        return 1;
    } else {
        return 0;
    }
}

?>

