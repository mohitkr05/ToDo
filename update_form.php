<?php
try {
 include 'connect_db.php';
    
    //prepare query
    $query = "select 
                task_id, task, target_date
            from 
                tasks 
            where 
                task_id = ? 
            limit 0,1";
            
    $stmt = $DBH->prepare( $query );

    //this is the first question mark
    $stmt->bindParam(1, $_REQUEST['task_id']);

    //execute our query
    if($stmt->execute()){
    
        //store retrieved row to a variable
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //values to fill up our form
        $task_id = $row['task_id'];
        $task = $row['task'];
        $target_date = $row['target_date'];
      
        
    }else{
        echo "Unable to read record.";
    }
}

//to handle error
catch(PDOException $exception){
    echo "Error: " . $exception->getMessage();
}
?>
<!--we have our html form here where new user information will be entered-->
<form id='updateTaskForm' action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Task</td>
            <td><input type='text' name='task' value='<?php echo $task; ?>' required /></td>
        </tr>
        <tr>
            <td>Target Date</td>
            <td><input type='text' name='target_date' value='<?php echo $target_date;  ?>' required /></td>
        </tr>
      
            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='task_id' value='<?php echo $task_id ?>' />
                <input type='submit' value='Update' class='customBtn' />
                
            </td>
        </tr>
    </table>
</form>
