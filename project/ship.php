<html>
    <head>
        <title> Shipping</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Ship Orders </h1>

<?php
    require ("./nav.php");
    $myusername = $type = ""; 
    
  //  session_start();
    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
    
      }
    if($type == 2 or $type == 1){
       // require ("./nav.php");
    
            echo '<table class = "table table-hover table-bordered" align="Left" cellspacing="10">';
            echo '<td class="success" align="center"><b>Pending</b></td>';
            echo '</table>'; 
            
            echo '<table class = "table table-hover table-bordered" align="Left" cellspacing="10">';
    	   //echo '<td align="center"><b>Pending</b></td>';
    	   echo '<td align="left"><b>Customer ID</b></td>';
    	   echo '<td align="left"><b>Shipment ID</b></td>';
           echo '<td align="left"><b>Ship IT</b></td>';
           
            $sql = "SELECT * From shipping where status = 'pending'"; 
            $result = mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)){
                echo '<tr><td align="left">' . $row[0]. '</td>'; 
                echo '<td align="left">' . $row[1]. '</td>';
                //echo "<td><form action='shipit.php' method='POST'><input type='hidden' name='tempId' value='".$row[1]."'/><input type='submit' name='ship' value='Ship Order' /></form></td>";
                echo "<td><form action='shipit.php' method='POST'><input type='hidden' name='tempId' value='".$row[1]."'/><input type='submit' name='submit-btn' value='Ship Order' /></form></td></tr>";

                echo '</tr>';
            } 
            echo "<br>";
            echo "</table>"; 
            echo "<br><br>"; 
         //   echo "Shipped Orders: <br>";
            
            echo '<br><br><br><table class = "table table-hover table-bordered" align="Left" cellspacing="10">';
            echo '<td class="info" align="center"><b>Shipped</b></td>';
            echo '</table>'; 
            echo '<table class = "table table-hover table-bordered" align="Left" cellspacing="10">';
    	   echo '<td align="left"><b>Customer ID</b></td>';
    	   echo '<td align="left"><b>Shipment ID</b></td>';
    	   
    	   $sql = "SELECT * From shipping where status = 'shipped'"; 
            $result = mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)){
                echo '<tr><td align="left">' . $row[0]. '</td>'; 
                echo '<td align="left">' . $row[1]. '</td>';
                echo '</tr>';
            }
            echo '</table>';     
    }
    $db->close(); 
?>