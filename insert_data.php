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
  
  /*** INSERT data ***/	
	
    $task = $_POST['task'];
    $target_date = $_POST['target_date'];
  
    $sql = "INSERT INTO tasks(task, target_date) VALUES (:task, :target_date)";
	$q=$DBH->prepare($sql);
	$q->execute(array(':task'=>$task,':target_date'=>$target_date));

  
    /*** close the database connection ***/
    $DBH = null;
  
 }
catch(PDOException $e) {
    echo $e->getMessage();
}


?>
