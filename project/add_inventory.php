<html>
    
    <head>
        <title> Add Product</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Add Product </h1>
</html>

<?php require("./nav.php");  ?>

    <form action="add_inventory.php" method="post">
    Product ID: <input type='text' name='ProductID'><br><br>
    Product Name: <input type='text' name='PName'><br><br>
   
    Price:<input type="text" name="price"><br><br>
    Quantity: <input type="text" name="quan"><br><br>
    Type: <input type="text" name="type"><br><br>
    <input type="submit" value="Submit"><br><br>
    </form> 

<?php
    
  if($type == 1 || $type == 2 ){
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $productID = mysqli_real_escape_string($db,$_POST['ProductID']);
      $ProductName = mysqli_real_escape_string($db,$_POST['PName']); 
      
      $p_price = (int)$_POST['price'];
      echo $p_price; 
      $QOH = mysqli_real_escape_string($db,$_POST['quan']); 
      $type = mysqli_real_escape_string($db,$_POST['type']); 
    
      $sql = "INSERT INTO inventory (ProductID, product_name,unit_price, QOH, type) VALUES ($productID,'$ProductName',$p_price,$QOH, '$type')";
      $result = mysqli_query($db,$sql);
        echo (mysqli_error($db));
        $db->close(); 
        
    } 
     
  }          
         

    
?>

</html>