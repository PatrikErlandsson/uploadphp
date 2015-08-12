<?php
    include 'system/header.php';
    //TEST HEJ
?>
<body>
    <div class="container">
        <div class="form-group" id="uploadForm">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" class="btn custom-file-input">
                <input type="text" name="description" class="form-control" maxlength="100" placeholder="Description">
                <input type="submit" value="Upload Image" name="submit" class="btn btn-primary btn-lg btn-block">
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
            <h2>1. <small>Choose image</small></h2>         
            <h2>2. <small><i>(Optional) Add description</i></small></h2>
            <h2>3. <small>Upload</small></h2>
            </div>
        </div>
    </div>
    
    <?php
    if(isset($_POST['submit'])){
        //echo "Ettan: " . $_FILES['fileToUpload']['name'] . " Ettan STOP";
        $_FILES['fileToUpload']['name'] = rand() * 4 . ".jpg";
        //echo "Twoan: " . $_FILES['fileToUpload']['name'] . " Twoan STOP";
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
        //$_FILES['fileToUpload']['name'] = "test2";
        
        //print_r($_FILES);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                 echo "<div class='alert alert-dismissible alert-danger'>";
                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                echo "<strong>Error </strong> Sorry, file is not an image";
                echo "</div>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
           // echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) {
            echo "<div class='alert alert-dismissible alert-danger'>";
                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                echo "<strong>Error </strong> Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                echo "</div>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
                echo "<div class='alert alert-dismissible alert-danger'>";
                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                echo "<strong>Error </strong> Sorry, file is too large";
                echo "</div>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
         //   echo "Sorry, your file was not uploaded.";
         // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            
            $pic = $_FILES["fileToUpload"]["name"];
            $stmt = $conn->prepare("INSERT into pics(fileName, byUser, description) VALUES(?,?,?)");
            $stmt->bind_param("sss", $pic, $user, $description);
            if(checkInputs($_POST['description'])){
                $description = $_POST['description'];
                $stmt->execute();
                echo "<div class='alert alert-dismissible alert-success'>";
                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                echo "<strong>Success </strong> The picture was uploaded";
                echo "</div>";
                $stmt->close();
                $conn->close();
            } else {
                echo "<div class='alert alert-dismissible alert-danger'>";
                echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
                echo "<strong>Error </strong> No special characters";
                echo "</div>";
            }
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
        }
    ?>
    
    
    
    
    
    
    
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="script/app.js"></script>
</body>
</html>
