<!doctype html>

<html lang="en">
<head>
        <meta charset="utf-8">
        <title>405 Toys & Games - Manage Inventory</title>
        
</head>

<body>
         

         

        <h2> Sales Statistics </h2>
        <p> Please select the time frame in which you would like to view. </p>
<?php
        // require("./nav.php");
         require("./nav.php");
         if($type == 2){
         echo "<form method='post'action='./stats.php'>";
         echo "<input type='submit' class='btn btn-info' 'name='date' value = 'Week' style='margin-right: 10px;'>";
         echo "<input type='submit' class='btn btn-success' name='date' value = 'Month' style='margin-right: 10px;'>";
         echo "<input type='submit' class='btn btn-warning' name='date' value = 'Year'>";
         echo "<p> Below is the history of sales: </p>";
         echo "</form>";

         if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $date = $_POST["date"];
            $current_date = date("Y-m-d");
            $past_date = "";

            if ($date === "Week"){
               $past_date = date("Y-m-d", strtotime("-1 week"));
              // $past_date = strtotime("-1 week");
            }
            if ($date === "Month"){
               $past_date = date("Y-m-d", strtotime("-1 months"));
               //$past_date = strtotime("-1 months");
            }
            if ($date === "Year"){
               $past_date = date("Y-m-d", strtotime("-1 year"));
               //$past_date = strtotime("-1 year");
            }
            
            $sql = "SELECT ProductID, quantity, Total, date FROM archived WHERE date BETWEEN '$past_date' AND '$current_date' GROUP BY date";
            $result = mysqli_query($db,$sql);
            echo "<table class='table table-striped table-bordered'>";
    
    echo "<tr>";
            echo "<th class='textAlignCenter'>Product ID</th>";
            echo "<th class='textAlignCenter'>Quantity</th>";
            echo "<th class='textAlignCenter'>Price (USD)</th>";
            echo "<th class='textAlignCenter'>Date (Y-M-D) </th>";
            
    echo "</tr>";
            while($row = mysqli_fetch_array($result)){
               echo '<tr><td align="left">' . $row[0]. '</td>'; 
                echo '<td align="left">' . $row[1]. '</td>';
                echo '<td align="left">' . $row[2]. '</td>';
                echo '<td align="left">' . $row[3]. '</td>';
                echo '</tr>';
                
            } 
            mysqli_error($db);
             
            
           
         }
         }
         else{
             header("Location: ./index.php");
         }

?> 
        </div>
</body>
</html>

