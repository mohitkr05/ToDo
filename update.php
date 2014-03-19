<?php
//include database connection
 include 'connect_db.php';
try{

    //write query
    //in this case, it seemed like we have so many fields to pass and 
    //its kinda better if we'll label them and not use question marks
    //like what we used here
   $query = "UPDATE tasks SET target_date = ? , task = ?, WHERE  tasks.task_id = ? ";     
    //prepare query for excecution
    $stmt = $DBH->prepare($query);

    //bind the parameters
   $stmt->bindParam(2, $_POST['task']);
    //this is the second question mark
    $stmt->bindParam(1, $_POST['target_date']);
    $stmt->bindParam(3, $_POST['task_id']);

    // Execute the query
    if($stmt->execute()){
        echo "Task was updated.";
    }else{
        echo "Unable to update Task.";
    }

}

//to handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>
