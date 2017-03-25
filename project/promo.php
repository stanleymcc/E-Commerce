<html>
    <head>
        <title> UK Bookstore</title>
        
        <h1><img src="img/UK-logo-web.png" alt="Logo" style="width:100px;height:100px;"> Promotion Page </h1>
<?php
    require("./nav.php");
    
    //SQL query for promo rates. 
   
    if($type == 2)
     {
        echo '<html>
    
    </head>
    <body>
        <head>
            <h2>Sales Promotion</h2>
        </head>
            <form action = "" method = "post">
                  <label>Discount  :</label><input type = "text" name = "promotion" class = "box"/><br /><br />
                      <input type = "submit" value = " Submit "/><br />
            </form>
        <head> <h2>Sales Statistics</h2></head>
    </body>
</html>'; 
        // $db = new mysqli('clke228.netlab.uky.edu','root','kestler3218','giftshop');
        
        $promotion = $_POST['promotion'];
        echo $promotion;
      
           
            
             $sql = "UPDATE inventory SET unit_price =(unit_price* ($promotion / 100)) ";
             $result = mysqli_query($db,$sql);
             mysqli_error($db);
             $db->close();
        
            
    }
    
?> 