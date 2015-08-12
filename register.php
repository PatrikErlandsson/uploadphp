<?php
    include "system/conn.php";
    include "system/functions.php";
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
                <form action="register.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Choose username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Choose password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="re_password" class="form-control" id="password" placeholder="Password again">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-default">Create</button>
                    </div>
                    
                </form>
                <div class="form-group">
                        <a href="index.php"><button class="btn btn-warning">Go back</button></a>
                </div>
            </div>
            
         
              <?php
 
                if(isset($_POST['submit']) && checkPost($_POST['username']) && checkPost($_POST['password']) && checkPost($_POST['re_password'])){
                    
                    if($_POST['password'] == $_POST['re_password']){
                        $stmt = $conn->prepare("INSERT INTO users(username, password) VALUES(?,?)");
                        $stmt->bind_param("ss", $username, $password);
                        $username = $_POST['username'];
                        $sql = mysql_query("SELECT FROM users (username, password, email) WHERE username='$username'");
                        if(mysql_num_rows($sql) != 0){
                            echo "<div class='alert alert-dismissible alert-danger'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                            echo "<strong>Error! </strong> Username already exists";
                            echo "</div>";
                            $stmt->close();
                            $conn->close();
                        } else {
                            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $stmt->execute();
                            echo "<div class='alert alert-dismissible alert-success'>";
                            echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                            echo "<strong>Congratz </strong> User created!";
                            echo "</div>";
                            $stmt->close();
                            $conn->close();
                        }
                        
                     } else {
                        echo "<div class='alert alert-dismissible alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                        echo "<strong>Error! </strong> Passwords dont match";
                        echo "</div>";
                    }
                    
                    
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
