<?php
//include database connection
include 'connect_db.php';

//select all data
$query = "SELECT * FROM tasks";
$stmt = $DBH->prepare( $query );
$stmt->execute();

//this is how to get number of rows returned
$num = $stmt->rowCount();

if($num>0){ //check if more than 0 record found

    echo " <table class='table table-striped'> ";//start table
    
        //creating our table heading
        echo "<thead><tr>";
            echo "<th>Task</th>";
            echo "<th>Target Date</th>";
            echo "<th style='text-align:center;'>Action</th>";
        echo "</tr></thead>";
        
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
            
            //creating new table row per record
            echo "<tr>";
                echo "<td>{$task}</td>";
                echo "<td>{$target_date}</td>";
                echo "<td style='text-align:center;'>";
                    // add the record id here
                    echo "<div class='taskId'>{$id}</div>";
                    
                    //we will use this links on next part of this post
                    echo "<button type='button' id='editBtn' class='btn btn-success'>Edit</button>";
                    
                    //we will use this links on next part of this post
                    echo " <button type='button' id='deleteBtn' class='btn btn-success'>Delete</button>";
                echo "</td>";
            echo "</tr>";
        }
        
    echo "</table>";//end table
    
}

// tell the user if no records found
else{
    echo "<div class='noneFound'>No records found.</div>";
}

?>
