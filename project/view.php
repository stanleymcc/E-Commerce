<html>
    <head>
        <title> Inventory</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> View/Update Inventory </h1>

<?php

require("./nav.php"); 
      
     if($type == 2 || $type == 1)
     {
     $sql = "SELECT ProductID, product_name, unit_price, QOH FROM inventory";
     echo '<body><p>';
     if($result = mysqli_query($db,$sql)){
    	echo '<table class="table table-hover table-boarded" align="Left" cellspacing="10">';
    	echo '<td align="left"><b>Product Name</b></td>';
    	echo '<td align="left"><b>Price</b></td>';
        echo '<td align="left"><b>Quantity</b></td>';
        echo '<td align="left"><b>Update</b></td></tr>';
        echo '<form method="Post" action="./update.php" id="update">'; 
        
    	while($row = mysqli_fetch_row($result)){
    		echo '<tr><td align="left">' . $row[1]. '</td>'; 
		    echo '<td align="left"> '. $row[2] . '</td>';
		    echo '<td align="left">'. $row[3] . '</td>';
		    echo '<td align="left"> <input type="number" name="quantity[]" min="0" max="20" value=' . $row[3].'></td>';
		    

		echo '</tr>';
    	}
    	
    	echo '<tr><td><input type="submit" name="send" value="Submit"></td></tr>';
    echo '</table>'; 
    	echo '</form>'; 
    	   

    	
    }
    echo '</p></body>';
    echo '<br><body><p>';
    
    echo '</p></body>';
   echo '<html> <body> <a href="add_inventory.php">Add a new product</a> </body></html>';
    
     }
    
    else{
        header("Location: ./index.php"); 
    }
    $db->close(); 
?>
 