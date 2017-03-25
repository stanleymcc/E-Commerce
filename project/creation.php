<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Account Registration </h1>

<?php

   require("./nav.php"); 

   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $mymail = mysqli_real_escape_string($db,$_POST['email']); 
      $mystreet = mysqli_real_escape_string($db,$_POST['street']); 
      $mycity = mysqli_real_escape_string($db,$_POST['city']); 
      $mystate = mysqli_real_escape_string($db,$_POST['state']); 
      $myzip = mysqli_real_escape_string($db,$_POST['zip']); 
      $userID = rand(1005,5000); 
      $type = 0; 
      $sql = "INSERT INTO users VALUES ('$myusername','$mymail','$mypassword','$userID', '$mystreet', '$mycity','$mystate', '$myzip', '$type')";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 } 

	echo "<script type='text/javascript'> window.open(./login.php) </script>";
	$db->close(); 
?>

<html> 

<head> 
	<title>User Creation</title>
</head>

<body>

   <form action = "" method = "post">
      Name  :<input type = "text" name = "username" class = "box"/><br><br>

      E-Mail  :<input type= "text" name = "email" class = "box" /><br><br>

      Password  :<input type = "password" name = "password" class = "box" /><br><br>

      Street :<input type= "text" name = "street" class = "box" /><br><br>
      
      City :<input type= "text" name = "city" class = "box" /><br><br>

      State :<input type= "text" name = "state" class = "box" /><br><br>
      
      Zip :<input type= "text" name = "zip" class = "box" /><br><br>
      
      <input type = "submit" value = " Submit "/><br />
   </form>
               

</html>
