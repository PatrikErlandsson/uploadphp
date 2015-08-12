<?php
    include "system/conn.php";
    session_start();
?>


<!DOCTYPE html>
<html ng-app="">
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    
</head>

<body>
    <center><h2>ViPic <small>login</small></h2></center>
        <div class="container">
            <div id="login">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-default">Login</button>
                    </div>
                    
                </form>
                <div class="form-group">
                        <a href="register.php"><button class="btn btn-warning">Not a member?</button></a>
                    </div>
            </div>
            
         
              <?php
 
                if(isset($_POST['submit']) && !empty($_POST['username'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    //$cryptPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
                    $result = $conn->query($sql);
                    if($result){
                        while($row = $result->fetch_assoc()){
                            $cryptPassword = $row['password'];
                            if (password_verify($password, $cryptPassword)) {
                                $_SESSION['user'] = $username;
                                $sql = "UPDATE users SET online='1' WHERE username = '$username'";
                                $result = $conn->query($sql);
                                header('Location: main.php');
                            } else {
                                echo "<div class='alert alert-dismissible alert-danger'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                                echo "<strong>Error! </strong> Wrong password";
                                echo "</div>";
                            }
                        }
                    }
                } else {
                }
   
?>      
                    
      
    
    
    
    
    
    
    
    
    
    
    </div>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="script/app.js"></script>
</body>
</html>
