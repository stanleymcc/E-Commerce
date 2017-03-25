

<?php

include './config.php'; 

//echo " <link href='../bower_componets/bootstrap/dist/css/bootstrap.css' rel='stylesheet' media='screen'>";
//echo "<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
//    <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>";
 
$action = isset($_GET['action']) ? $_GET['action'] : ""; 
$pid = isset($_GET['pid']) ? $_GET['pid'] : "1";
$product_name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "1";
session_start();
   $myusername = $type = ""; 
      if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
      }

$sql = "SELECT * From inventory i ORDER BY i.product_name"; 
$result = mysqli_query($db,$sql);
$count = count($result); 
 //printf("Error: %s\n", mysqli_error($db));

    
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
      
      

?>
