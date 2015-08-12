<?php
    include 'system/header.php';
?>
    
    <div class="container" id="content">
        


<div id="box">
           
            
            
<h3 class="page-header">Latest pic</h3>

<?php //SCRIPT START
    include "system/conn.php";
    $sql = "SELECT fileName, byUser, description FROM pics ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if($result){
        while($row = $result->fetch_assoc()){
                $src = "uploads/" . $row['fileName'];
                $uploadedBy = $row['byUser'];
                $description = $row['description'];
                echo "<img src=" . $src . "><br>";
                if($description != null){
                    echo "<div class='well well-sm'>";
                    echo "<i>" . $description . "</i>";
                    echo "</div>";
                    }
                echo "<p id='by'>Uploaded by <a href='publicprofile.php?u=" . $row['byUser'] . "'>" . $uploadedBy . "</a></p>";
                

            }

        } else {
        echo "No picture";
    }

    //SCRIPT END
?> 

</div>
<div class="galleryThumbs">
    <h3 class="page-header">Recent pics</h3>

    <div class="row">
    
    <?php
    $sql = "SELECT fileName, byUser, description FROM pics WHERE id != (SELECT MAX(id) FROM pics) ORDER BY id DESC LIMIT 12";
    $result = $conn->query($sql);

    if($result){
        while($row = $result->fetch_assoc()){
                $src = "uploads/" . $row['fileName'];
                $description = $row['description'];
                echo "<div class='col-md-6'>";
                echo "<img src='" . $src . "' alt='img'>";
                  if($description != null){
                    echo "<div class='well well-sm'>";
                    echo "<i>" . $description . "</i>";
                    echo "</div>";
                    }
                echo "<p>Uploaded by ";
                echo "<a href='publicprofile.php?u=" . $row['byUser'] . "'>" . $row['byUser'] . "</a></p>";
                echo "<hr>";
                echo "</div>";

            }

        } else {
        
    }
    ?>
    </div>          
</div>


  
 
    <!-- normal -->
    
        
        
        
          
            
            
         
    <!-- end normal -->
 
  
     

    
    
    
    </div>
    
    <!-- jQuery library -->
    

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
