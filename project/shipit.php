<?php
    require ("./config.php");
    $myusername = $type = ""; 
    
    session_start();
    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
    
      }
      
    if($type == 2 or $type == 1){
        echo "User is okay";
            if(isset($_POST["tempId"])) {
                $stat = "shipped";
                $temp= $_POST["tempId"];
                $sql = "select QOH from inventory where ProductID in (Select ProductID from archived where order_num = )";
                $sql = "Update shipping set status='$stat' where ShipmentID='$temp'";
                $result = mysqli_query($db,$sql);
                
            //      $warning = "Select * from cart where email = '$myusername'"; 
            //      $result = mysqli_query($db,$warning);
            //      $row = mysqli_fetch_array($result);
            //      while($row_2 = mysqli_fetch_array($result_2)){
            //                 $IQ = "Select QOH from inventory where ProductID =$row_2[0]";
            //                 $result2= mysqli_query($db,$IQ);
            //                 $INQ = mysqli_fetch_array($result2);
            //                 mysqli_error($db); 
            //                 $newq = $INQ[0] - $row_2[1];
            //                 $sql = "Update inventory Set QOH=$newq where ProductID = $row_2[0]"; 
            //                 $result_ = mysqli_query($db,$sql); 
            //                 mysqli_error($db);

            //   }
                // grabs order number from shipping table for shipment ID
                $sql2 = "Select order_number from shipping where shipment_ID = $temp";
                $result2 = mysqli_query($db,$sql2);
                while ($row = mysqli_fetch_array($result2)) {
                    
                // updates archived table based on shipping ID and order nunmber 
                $sql1 = "Upate archived set shipment_ID='$temp' where order_number = $row[0]";
                $result1 = mysqli_query($db,$sql1);
                
                }
               header('Location: ./ship.php');
            }
    }
    $db->close(); 
?>