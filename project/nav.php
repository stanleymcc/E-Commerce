
<nav class="navbar navbar-inverse">
<div class="container-fluid">
   <ul class="nav navbar-nav">
      <li><a href="./index.php">UK Bookstore</a></li>
      
<?php

  require ("./config.php"); 
  require("./boot.html"); 
  session_start(); 
  echo '
            <style>
                    .navbar-nav li a {
                   line-height: 45px;
                  }
                  .btn btn-success span {
                    margin-bottom: 10px;
                    margin-top: 10px;
                  }
                  
            </style>'; 
    $myusername = $type = ""; 
     if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])){
           $myusername = $_SESSION['login_user']; 
           $type = $_SESSION['type'];
           
      
      if($type == 0){
            echo "<li><a href='history.php'>Order History</a></li>";   
            echo "<li><a href='book.php'>Books</a></li>";
            echo "<li> <a href='games.php'>Games</a></li>";
            echo '<form method="POST" action="search.php" class="navbar-form navbar-left" style="padding-top: 16px;">
        <input type="text"  name="search" placeholder="Search">
        
      
      <input type="submit" value="Search"></form>';
            echo '</ul>';
            echo '<ul class="nav navbar-nav navbar-right">'; 
            
            echo "<li><a><span class='btn btn-danger navbar-btn'><span class='glyphicon glyphicon-user'></span>  $myusername</span></a></li>";

            echo "<li><a href='logout.php'><span class='btn btn-success navbar-btn'><span class='glyphicon glyphicon-log-out'></span> Logout</a></span></li>";
            $sql = "SELECT * from cart where email = '$myusername'"; 
            $result = mysqli_query($db,$sql);
            $count = mysqli_num_rows($result); 
            echo "<li><a href='cart.php'><span class='btn btn-primary navbar-btn'><span class='glyphicon glyphicon-shopping-cart'></span> $count Cart</a></span></li>"; 
            echo "</ul></nav></div>"; 
      }
      elseif($type == 1){
          echo "<li><a href='staff.php'>Staff Dashboard</a></li>";
          echo "<li><a href='view.php'>View/Update Inventory</a></li>";
          echo "<li><a href='ship.php'>Ship Orders</a></li>";
          echo '<form method="POST" action="search.php" class="navbar-form navbar-left" style="padding-top: 16px;">
        <input type="text"  name="search" placeholder="Search">
      
      <input type="submit" value="Search"></form>';
          echo '</ul><ul class="nav navbar-nav navbar-right">'; 
          echo "<li><a href='logout.php'><span class='btn btn-success navbar-btn'><span class='glyphicon glyphicon-log-out'></span> Logout</a></span></li>";
          echo "</ul></nav></div>"; 
      }
      elseif($type ==2){
        echo "<li><a href='view.php'>View/Update Inventory</a></li>";
        echo "<li><a href='ship.php'>Ship Orders</a></li>";
        echo "<li><a href='promo.php'>Promotion</a></li>";
        echo "<li><a href='stats.php'>Statics</a></li>";
        echo '<form method="POST" action="search.php" class="navbar-form navbar-left" style="padding-top: 16px;">
        <input type="text"  name="search" placeholder="Search">
      
      <input type="submit" value="Search"></form>';
        echo '</ul><ul class="nav navbar-nav navbar-right">'; 
        echo "<li><a href='logout.php'><span class='btn btn-success navbar-btn'><span class='glyphicon glyphicon-log-out'></span> Logout</a></span></li>";
        echo "</ul></nav></div>"; 
      }
    }
    
      else{
          echo '<form method="POST" action="search.php" class="navbar-form navbar-left" style="padding-top: 16px;">
        <input type="text"  name="search" placeholder="Search">
      
      <input type="submit" value="Search"></form>';
            echo '</ul>';
            echo '<ul class="nav navbar-nav navbar-right">';
            echo "<li><a href='creation.php'><span class='btn btn-success navbar-btn'><span class='glyphicon glyphicon-log-in'></span> Register</a></span></li>";
          echo "<li><a href='login.php'><span class='btn btn-success navbar-btn'><span class='glyphicon glyphicon-log-in'></span> Login</a></span></li>";
          echo "</ul></nav></div>"; 
      }
      
?>
