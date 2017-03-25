<?php
    require("./config.php"); 
    require("./nav.php"); 
      if(isset($myusername)){
         
          
          $quantity  = isset($_POST['tempId']) ?  $_POST['tempId'] : die;
          $pname = $_POST["product_name"]; 
          //print_r($quantity); 
          $sql1 = " Select * from inventory where $pname not in (
                   select ProductID 
                  from cart
                  where email = '$myusername')"; 
              $result = mysqli_query($db,$sql1); 
              $row = mysqli_fetch_array($result); 
              if(count($row) > 0){
              //$num = rand(1,5000); 
              $sql = "INSERT INTO cart (email, ProductID, quantity) VALUES ('$myusername', $pname, $quantity)"; 
              $result1 = mysqli_query($db,$sql);
              echo (mysqli_error($db));
            header("Location: ./index.php"); 
              }
              else{
                $sql1 = "Select quantity from cart where ProductID = $pname"; 
                $result = mysqli_query($db,$sql1); 
                $quan = mysqli_fetch_array($result); 
                 
                $q = $quan[0] + $quantity; 
                echo $q; 
                $sql2 = "UPDATE cart set quantity=$q  where ProductID=$pname"; 
                $result = mysqli_query($db,$sql2); 
              header("Location: ./index.php"); 
                
              }

      }
      
      else
      {
          header("Location: login.php");
      }
      $db->close();
?> 