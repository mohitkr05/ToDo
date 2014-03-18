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
  $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM tasks";
    foreach ($DBH->query($sql) as $row)
        {
        print $row['task'] .' - '. $row['target_date'] . '<br />';
        }
$result = $sql->fetchAll();        
echo json_encode($result);
    /*** close the database connection ***/
    $DBH = null;
  
 }
catch(PDOException $e) {
    echo $e->getMessage();
}


?>
