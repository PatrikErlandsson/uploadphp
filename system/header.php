<?php
    ob_start();
    include "system/conn.php";
    include "system/functions.php";
    session_start();
    if(!$_SESSION['user']) {
        header('Location: index.php');
    } else {
        $user = $_SESSION['user'];
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    
    <!-- Latest compiled and minified CSS -->
    <link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boot-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="script/app.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>App</title>
    
</head>

<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php">ViPic</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="profile.php"><?php echo "Profile: " . $_SESSION['user']; ?><span class="glyphicon glyphicon-user pull-right"></span></a></li>
        <li><a href="upload.php">Upload<span class="glyphicon glyphicon-cloud-upload pull-right"></span></a></li>
        <li><a href="members.php">Member list<span class="glyphicon glyphicon-list-alt pull-right"></span></a></li>
        <li><a href="logout.php">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
      </ul>
      
    </div>
  </div>
</nav>
    <div id="ptr">
  <!-- Pull down arrow indicator -->
  <span class="genericon genericon-next"></span>