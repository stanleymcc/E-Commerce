<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;">Welcome to the UK Bookstore </h1>
        
</html>
<?php
    require("./nav.php");
   // echo "Hello World"; 
    
    $search = $_POST["search"];
    if(isset($search)){
       // echo $search; 
        $sql = "SELECT * From inventory  where product_name Like '%" . $search ."%'"; 
        $result = mysqli_query($db,$sql);
        $count = count($result); 
         echo mysqli_error($db);

    
    echo "<table class='table table-hover table-responsive table-bordered'>";
    
    echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price (USD)</th>";
            echo "<th style='width:5em;'>Quantity</th>";
            
    echo "</tr>";

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        
        extract($row); 
        
        echo "<tr>";
                echo "<td>";
                    echo "<form action='add_cart.php' method='POST'><div style='display: none;'><input name=product_name value={$ProductID}></div>";
                    echo "<div class='product-name'>{$product_name}</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($unit_price, 2, '.' , ',') . "</td>";
            
                    echo "<td>";
                          echo "<input type='number'min=0 max=$QOH name='tempId' value='0'/><input type='submit' name='submit-btn' value='Add to Cart' /></form></tr>";
                   echo "</td>";
                   
            
            
            
   echo "</tr>";
        }
        
        
    echo "</table>";
    //echo "</form>";
      

    $db->close();
      //}
      
      
    }
    else{
        header("Location: ./index.php"); 
    }