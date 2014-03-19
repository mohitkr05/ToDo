
<!--we have our html form here where new user information will be entered-->
<form id='updateUserForm' action='update.php' method='post' border='0'>
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
