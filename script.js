jQuery(document).ready(function(){
    
    // VIEW Tasks on load of the page
    $('#loaderImage').show();
    showTasks();
    
    // clicking the 'VIEW Tasks' button
    $('#viewTasks').click(function(){
        // show a loader img
        $('#loaderImage').show();
        
        showTasks();
    });
    
    // clicking the '+ NEW Task' button
    $('#addTask').click(function(){
        showCreateTaskForm();
    });

    // clicking the EDIT button
    $(document).on('click', '.editBtn', function(){ 
    
        var Task_id = $(this).closest('td').find('.TaskId').text();
        console.log(Task_id);
        
        // show a loader image
        $('#loaderImage').show();

        // read and show the records after 1 second
        // we use setTimeout just to show the image loading effect when you have a very fast server
        // otherwise, you can just do: $('#pageContent').load('update_form.php?Task_id=" + Task_id + "', function(){ $('#loaderImage').hide(); });
        setTimeout("$('#pageContent').load('update_form.php?Task_id=" + Task_id + "', function(){ $('#loaderImage').hide(); });",1000);
        
    }); 
    
    
    // when clicking the DELETE button
    $(document).on('click', '.deleteBtn', function(){ 
        if(confirm('Are you sure?')){
        
            // get the id
            var Task_id = $(this).closest('td').find('.TaskId').text();
            
            // trigger the delete file
            $.post("delete.php", { id: Task_id })
                .done(function(data) {
                    // you can see your console to verify if record was deleted
                    console.log(data);
                    
                    $('#loaderImage').show();
                    
                    // reload the list
                    showTasks();
                    
                });

        }
    });
    
    
    // CREATE FORM IS SUBMITTED
     $(document).on('submit', '#addTaskForm', function() {

        // show a loader img
        $('#loaderImage').show();
        
        // post the data from the form
        $.post("create.php", $(this).serialize())
            .done(function(data) {
                // 'data' is the text returned, you can do any conditions based on that
                showTasks();
            });
                
        return false;
    });
    
    // UPDATE FORM IS SUBMITTED
     $(document).on('submit', '#updateTaskForm', function() {

        // show a loader img
        $('#loaderImage').show();
        
        // post the data from the form
        $.post("update.php", $(this).serialize())
            .done(function(data) {
                // 'data' is the text returned, you can do any conditions based on that
                showTasks();
            });
                
        return false;
    });
    
});

// READ Tasks
function showTasks(){
    // read and show the records after at least a second
    // we use setTimeout just to show the image loading effect when you have a very fast server
    // otherwise, you can just do: $('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });
    // THIS also hides the loader image
    setTimeout("$('#pageContent').load('read.php', function(){ $('#loaderImage').hide(); });", 1000);
}

// CREATE Task FORM
function showCreateTaskForm(){
    // show a loader image
    $('#loaderImage').show();
    
    // read and show the records after 1 second
    // we use setTimeout just to show the image loading effect when you have a very fast server
    // otherwise, you can just do: $('#pageContent').load('read.php');
    setTimeout("$('#pageContent').load('create_task.php', function(){ $('#loaderImage').hide(); });",1000);
}
