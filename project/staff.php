<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Staff Dashboard </h1>
        
</html>

<?php
     session_start();
     require("./nav.php");
      $myusername = $type = ""; 
      if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']));{
          $myusername = $_SESSION['login_user']; 
          $type = $_SESSION['type']; 
      }
      
     if($type == 1)
     {
         
     $db->close(); 
     }
     else{
         echo "Bad Location"; 
         header("Location: ./index.php"); 
     }
?>


    