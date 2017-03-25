<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Account Login </h1>

<?php
   require("./nav.php"); 
   
   
  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT type FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $type = $row['type'];
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1 && $type == 0) { 
      $_SESSION['login_user'] = $myusername; 
      $_SESSION['type'] = $type; 
	   header("location: index.php"); 
      }

      elseif ($count == 1 && $type == 1) {
         $_SESSION['login_user'] = $myusername; 
         $_SESSION['type'] = $type;
         header("location: staff.php"); 
      }

      elseif ($count == 1 && $type == 2) {
         $_SESSION['login_user'] = $myusername; 
         $_SESSION['type'] = $type; 
      	header("location: manager.php"); 
      }

      else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   $db->close(); 
?>
<html>
   
   <head>
      <title>Gift Shop Login</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>UK Webstore Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
