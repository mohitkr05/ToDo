<?php
//include database connection
include 'connect_db.php';

try {

    $query = "DELETE FROM Tasks WHERE id = ?";
    $stmt = $DBH->prepare($query);
    $stmt->bindParam(1, $_POST['id']);
    
    if($stmt->execute()){
        echo "Task was deleted.";
    }else{
        echo "Unable to delete Task.";
    }
    
}

//to handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>
