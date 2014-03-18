<?php
//include database connection
include 'connect_db.php';

try{
    //write query
    $query = "INSERT INTO tasks SET tasks = ?, target_date = ? ";

    //prepare query for excecution
    $stmt = $DBH->prepare($query);

    //bind the parameters
    //this is the first question mark
    $stmt->bindParam(1, $_POST['tasks']);

    //this is the second question mark
    $stmt->bindParam(2, $_POST['target_date']);

 
    // Execute the query
    if($stmt->execute()){
        echo "Task was created.";
    }else{
        echo "Unable to add Task.";
    }
}

//to handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>
