<?php
    include 'system/header.php';
?>
<div id="container">
<?php
    if(isset($_GET['u'])){
        $u = $_GET['u'];
        echo "<center><h2>Profile <small>" . $u ."</small></h2></center>";
            echo "<center><h4>Uploads:</h4></center>";
            echo "<div class='galleryThumbs'>";
            $sql = "SELECT fileName, time FROM pics WHERE byUser = '$u' ORDER BY time DESC";
            $result = $conn->query($sql);

            if($result){
                while($row = $result->fetch_assoc()){
                $src = "uploads/" . $row['fileName'];
                $time = $row['time'];
                echo "<div class='col-md-6'>";
                echo "<img src='" . $src . "' alt='img'></a>";
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
    
        
  
        
        </div>

    
    <!-- jQuery library -->
    

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
