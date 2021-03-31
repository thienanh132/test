<?php

?>
<?php 
//error reporting
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// global variables and constants

$dbName = "Activity";


define('HOST_NAME', "localhost");
define('USER_NAME', "root");
define('PASSWORD', "root");
define('EMPTY_STRING', "");

$dbConnect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD);
    echo "<h2>Activity 2</h2>";

if (!$dbConnect) {
    echo "<p>Connection error: " . mysqli_connect_error() . "</p>";  
    
}
    else {
    // select database 
    if (mysqli_select_db($dbConnect, $dbName)) {
        // success 
        echo "<p> Successfully selected the " . $dbName . 
        " database. </p>";
  
        $tableName = "users";
        $sql = "SELECT * FROM  $tableName";
        if ($result = mysqli_query($dbConnect, $sql)) {
            echo "<h3>Users!</h3>";
            if (mysqli_num_rows($result) > 0) {
                
               echo "<p>Number of users registered in table <strong>$tableName</strong>" . 
               mysqli_num_rows($result). "</p>";
               $rowNbr = 0;
               while ($row = mysqli_fetch_assoc($result)) {
                    $rowNbr++;
                    echo "$rowNbr";
               }      
            }  
        else {
            echo "<p> No users are registered in table <strong>$tableName</strong></p> " . mysqli_error($dbConnect) . "</p>";
        }
 }                        
         else {
             echo "<p>Error: " . mysqlo_error($dbConnect) . "</p>";
         }
            
    }
    else {
         echo "<p> Could not select the ". $dbName . " database: " . mysqli_errno($dbConnect). "</p>";
             
    }
    
             echo "Database Closing";
             mysqli_close($dbConnect);
             
    }
    ?>
