<?php

require("./config.php"); 
 require("./boot.html");
 

      session_start();
   $myusername = $type = ""; 
      if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
      
    if(isset($_POST['checkout'])) {
            $warning = "Select * from cart where email = '$myusername'"; 
            $result = mysqli_query($db,$warning);
            $row = mysqli_fetch_array($result);
            $count = count($row);
            date_default_timezone_set("America/New_York");
            $time = date("h:i:sa");
            $date = date("Y-m-d");
            $tot = $_POST['total']; 
            if($count > 0){
                $uid = $row[0]; 
                $shipID = rand(1005,5000);
                $stat = "pending";
                $order_num = rand(1005,5000);
            
               $sql1 = "Select ProductID, quantity from cart where email='$myusername'"; 
               $result_2= mysqli_query($db,$sql1);
               mysqli_error($db); 
             
                while($row_2 = mysqli_fetch_array($result_2)){
               
              $IQ = "Select QOH from inventory where ProductID =$row_2[0]";
              $result2= mysqli_query($db,$IQ);
               $INQ = mysqli_fetch_array($result2);
               mysqli_error($db); 
               $newq = $INQ[0] - $row_2[1]; 
              
              $sql = "Update inventory Set QOH=$newq where ProductID = $row_2[0]"; 
              $result_ = mysqli_query($db,$sql); 
              mysqli_error($db);
              
                }
                
                $id = "Select userID from users where email = '$myusername'";
                
                $result = mysqli_query($db,$id);
                $row = mysqli_fetch_array($result);

                // update order number in cart table 
                $update_order_num = "Update cart Set order_num=$order_num Where email='$myusername'";
                $result5 = mysqli_query($db,$update_order_num);
                

                // inserts into shipping table
                $ins = "Insert into shipping(email, ShipmentID, status, order_number) values ('$myusername', '$shipID', '$stat', $order_num)"; 
                $result2 = mysqli_query($db,$ins);
                
                // inserts order into archived table
               // $sql5 = "select ProductID, quantity, email from cart where email= '$myusername'"; 
                //$result5 = mysqli_query($sql5)
                $move = "Insert Into archived(ProductID, quantity, email, order_num,Total) select ProductID, quantity, email,order_num, Total from cart where email= '$myusername'";
                $result3 = mysqli_query($db,$move);

                
                // updates archived table with date/time of order checkout
                $update = "Update archived SET date='$date', time='$time' Where order_num='$order_num'";
                $result4 = mysqli_query($db,$update);
            
                // removes order from cart table 
            $remove = "Delete from cart where email = '$myusername'";
            $result3 = mysqli_query($db,$remove);
            
           header("Location: ./index.php"); 
            
            }
            else{
                echo' <div class="alert alert-warning">
                     <strong>Warning!</strong> Your cart is empty.
            </div>';
           header("Location: ./index.php"); 
            }
        }
      }
 
        $db->close(); 
?>