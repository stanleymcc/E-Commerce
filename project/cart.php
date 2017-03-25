<!-- This shows the cart for the current users. --> 
<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> My Cart </h1>
        
</html>

<?php
    
    require("./nav.php");
    //require("./config.php"); 
    session_start(); 
    $myusername = $type = ""; 
      if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
      }
     $q = "quantity";
     $i = "item"; 
     
     if($type == 0)
     {
           
           $sql = "SELECT quantity, ProductID FROM cart where email='$myusername'";
           
           if($result = mysqli_query($db,$sql)){
           
           //echo mysqli_num_rows($result); 
           echo '<table class="table table-hover table-responsive table-bordered" align="Left" cellspacing="10">';
    	   echo '<td align="left"><b>Product Name</b></td>';
    	   echo '<td align="left"><b>Price</b></td>';
           echo '<td align="left"><b>Quantity</b></td>';
        
           while($row = mysqli_fetch_array($result))
           {
              
               $quan = $row[0]; 
               $item = $row[1];
             
               $sql = "Select QOH, product_name, unit_price from inventory where ProductID = $item"; 
               $result2 = mysqli_query($db,$sql);
               while($row2 = mysqli_fetch_array($result2)){
                   $price += $quan * $row2[2]; 
                   $sql2 = "Update cart Set Total=$price Where email='$myusername'";
                   $result3 = mysqli_query($db,$sql2); 
                   echo "<form action='update_cart.php' method='POST'><div style='display: none;'><input name='ProductID' value=$item></div>";
                    echo '<tr><td align="left">' . $row2[1]. '</td>'; 
		            echo '<td align="left"> $'. $row2[2] . '</td>';
		           echo '<td align="left">';
		           echo "<input type='number'min=0 max=$row2[0] name='tempId' value='$row[0]'/><input type='submit' name='submit-btn' value='Update' /></form></td></tr>";
		          
               }
               
               
           }
           echo'<td align="left">Total Price: $' . $price . '</td>';
           echo"<td align='left'> <form action='./checkout.php' method='POST'><input type='submit' name='checkout' value='Check Out'></form></td>"; 
           echo "</table>";
           }
           
        //   echo "<div style='position: absolute;top: 700px; left:20px;text-align:center;'><form action='./checkout.php' method='POST'><input type='submit' name='checkout' value='Check Out'></form></div>";
    }
     
     
    
   
     else {
         header("Location: ./index.php");
     }
     
      
     $db->close(); 
     
?>
