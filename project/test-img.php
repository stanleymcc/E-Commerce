<?php
    echo "<html>"; 
    $db = new mysqli('clke228.netlab.uky.edu','root','kestler3218','giftshop'); 
    $sql = "SELECT img FROM inventory";
      echo '<body><p>';
     if($result = mysqli_query($db,$sql)){
      	while($row = mysqli_fetch_row($result)){   
                echo "<img src = " . $row[0] . "> </img>"; 
         
        }
     }
    echo "</p></body>"; 
    $db->close();
?>