<?php
//include database connection
 include 'connect_db.php';
try{

    //write query
    //in this case, it seemed like we have so many fields to pass and 
    //its kinda better if we'll label them and not use question marks
    //like what we used here
    $query = "update 
                tasks 
            set 
                task = :task, 
                target_date = :target_date, 
            where
                id = :id";

    //prepare query for excecution
    $stmt = $DBH->prepare($query);

    //bind the parameters
    $stmt->bindParam(':task', $_POST['task']);
    $stmt->bindParam(':target_date', $_POST['target_date']);
 

    $stmt->bindParam(':id', $_POST['id']);

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
