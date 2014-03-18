<?php

/* Connect to the database */

/**
 * Database details
 */

$host='localhost'; 
$dbname='todo'; 
$user='mohit'; 
$pass='12345'; 

 
try {
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  
 }
catch(PDOException $e) {
    echo $e->getMessage();
}


?>
