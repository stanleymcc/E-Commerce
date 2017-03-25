

<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Order History </h1>
    
 
  
  <?php
  require ("./config.php"); 
  require("./nav.php");
  
  echo '<table class="table table-hover table-bordered" align="Left" cellspacing="10">';
    	   echo '<td align="left"><b>Order Number</b></td>';
    	   echo '<td align="left"><b>Product ID</b></td>';
    	   echo '<td align="left"><b>Quantity</b></td>';
    	   echo '<td align="left"><b>Ship Date</b></td>';
    	   echo '<td align="left"><b>Ship Time</b></td>';
           
            $sql = "SELECT * From archived where email = '$myusername'"; 
            $result = mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td align="left">' . $row[3]. '</td>'; 
                echo '<td align="left">' . $row[0]. '</td>';
                echo '<td align="left">' . $row[1]. '</td>';
                echo '<td align="left">' . $row[5]. '</td>';
                echo '<td align="left">' . $row[6]. '</td>';
                echo '</tr>';
            } 
            echo "<br>";
    echo"</table>"; 


  ?>
  

