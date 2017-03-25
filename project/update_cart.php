<?php
  
  require("./nav.php");

  if(isset($myusername)){
          
          
          $quantity  = isset($_POST['tempId']) ?  $_POST['tempId'] : die;
          $productID = $_POST['ProductID']; 
         echo "Product ID -> $productID"; 
          
            
            $sql1 = "Select quantity from cart where ProductID = $productID"; 
            $result1 = mysqli_query($db,$sql1); 
            $quan = mysqli_fetch_array($result1); 
            if($quantity > 0){
            $q = $quan[0] + $quantity; 
                echo $q; 
                $sql2 = "UPDATE cart set quantity=$quantity  where ProductID=$productID"; 
                $result = mysqli_query($db,$sql2); 
           // $sql = "Update cart set quantity=$quantity[$i] where email ='$myusername' and ProductID=$productID"; 
          //  $result1 = mysqli_query($db,$sql);
          echo (mysqli_error($db));
          $db->close();
         header("Location: ./cart.php");
            }
            else{
               echo "HEY";
              $sql = "Delete from cart where ProductID = $productID"; 
              $result1 = mysqli_query($db,$sql);
              echo (mysqli_error($db));
              $db->close();
              header("Location: ./cart.php"); 
            }
        
       
      }
      
      
   
      
  
?>    