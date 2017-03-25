<?php
$db = new mysqli('clke228.netlab.uky.edu','root','kestler3218','giftshop'); 

   session_start();
   $myusername = $type = ""; 
      if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
      }
      
     if($type == 2 || $type == 1)
     {
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $sql = "SELECT ProductID from inventory";
      $result = mysqli_query($db,$sql);
      
      $num = $_POST['quantity'];
      //print_r($num); 
      $p_id =array();
      $price = array(); 
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
     
         foreach($row as $key => $value){ 
            $pid[$key] = $value; 
            array_push($p_id,$value); 
            #echo $key . '<br>'; 
            #echo $value . '<br>'; 
         }
         
      }
      $sql = "SELECT unit_price from inventory";
      $result = mysqli_query($db,$sql);
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
          foreach($row as $key => $value){
            $price[$key] = $value; 
            array_push($price,$value); 
      }
      }
      
     // print_r($p_id); 
      $i = 0; 
      for($x = 0; $x <= count($p_id); $x++){ 
       
            $p = (int)$p_id[$x]; 
            $n = (int)$num[$x];  
            $u = (double)$price[$x];  
           // echo "$p -> $n  <br><br>";
            
            $sql = "UPDATE inventory set QOH = $n, unit_price = $u where ProductID = $p" ;
            $result = mysqli_query($db,$sql);
            
           
      }
      
      $sql = "SELECT product_name, unit_price, QOH, ProductID  FROM inventory";
      echo '<body><p>';
      if($result = mysqli_query($db,$sql)){
    	   echo '<table align="Left" cellspacing="10">';
    	   echo '<td align="left"><b>Product Name</b></td>';
    	   echo '<td align="left"><b>Price</b></td>';
         echo '<td align="left"><b>Quantity</b></td>';
         

        
    	while($row = mysqli_fetch_row($result)){
    		 echo '<tr><td align="left">' . $row[0]. '</td>'; 
		    echo '<td align="left"> $'. $row[1] . '</td>';
		    echo '<td align="left">'. $row[2] . '</td>';
          echo '</tr>';
    	   }
    	echo '</table>'; 
      }
   }
   $db->close(); 
     }
     else{
         header("Location: ./index.php"); 
     }
                     header('Location: ./view.php');

?>


<form method="Post" action="./manager.php" id="update">
<div style="position: absolute;top: 250px; left:20px;text-align:center;"><a <button type="button" name="home" value="Home Page"></div>

