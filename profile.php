<?php
    include 'system/header.php';
    if(isset($_GET['u'])){
        $u = $_GET['u'];
        echo "<center><h2>Profile <small>" . $u ."</small></h2></center>";
            echo "<h3>Uploads:</h3>";
            echo "<div class='galleryThumbs'>";
            $sql = "SELECT fileName, time FROM pics WHERE byUser = '$u' ORDER BY id DESC";
            $result = $conn->query($sql);

            if($result){
                while($row = $result->fetch_assoc()){
                $src = "uploads/" . $row['fileName'];
                $time = $row['time'];
                echo "<div class='col-md-6'>";
                echo "<a target='_blank' href='previewpic.php?p=" . $src . "'><img src='" . $src . "' alt='img'></a>";
                echo "<p class='text-primary'>Uploaded " . $row['time'] . "</p>";        
                echo "</div>";
                echo "<hr>";
            
                    
 
                    }

                } else {
                echo "No picture";
            }
    
    } else {
        
    }
    
?>
    <div id="container">
        
  
        <?php
            $uploadsCount = 0;
            echo "<center><h2>Profile</h2></center>";
            echo "<center><h4>Uploads:</h4></center>";
            echo "<div class='galleryThumbs'>";
            $sql = "SELECT fileName, time FROM pics WHERE byUser = '$user' ORDER BY id DESC";
            $result = $conn->query($sql);

            if($result){
                while($row = $result->fetch_assoc()){
                $src = "uploads/" . $row['fileName'];
                $time = $row['time'];
                echo "<div class='col-md-6'>";
                echo "<img src='" . $src . "' alt='img'>";
                echo "<p class='text-primary'>Uploaded " . $row['time'] . "</p>";        
                echo "</div>";
                echo "<a href='removepic.php?p=" . $row['fileName'] . "' class='btn btn-warning'>Delete</a>";
                echo "<hr>";
            
                    
 
                    }

                } else {
                echo "No picture";
            }
        ?>
        
        <a href="upload.php" class="btn btn-default btn-lg btn-block">Upload more pictures</a>
        </div>
    </div>
    
    <!-- jQuery library -->
    

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
