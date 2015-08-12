<?php
    include 'system/header.php';
?>
    <div class="container">
        <h3 class="page-header">Members</h3>
        <ul class="list-group">
        <?php
            $sql = "SELECT username, online FROM users ORDER BY username ASC";
            $result = $conn->query($sql);
            
            if($result){
                while($row = $result->fetch_assoc()){
                    $username = $row['username'];
                    $online = $row['online'];
                    echo "<li class='list-group-item'>";
                    echo "<span class='label label-info pull-right'>";
                    //Check how many posts user has
                        echo checkNumPosts($username);
                        echo " posts";
                    
                    echo "</span>";
                    if($online == 0){
                        echo "<span class='label label-default pull-right'>";
                        echo "Offline";
                        echo "</span>";
                    } else {
                        echo "<span class='label label-success pull-right'>";
                        echo "Online";
                        echo "</span>";
                    }
                    
                    echo "<a href='publicprofile.php?u=" . $row['username'] . "'>" . $row['username'] . "</a>";
                    echo "</li>";
                }
            }




        ?>
        </ul> 
    </div>
    
    <!-- jQuery library -->
    

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
