<?php

/* ==============================================
 * 				ToDo App 
 * ==============================================
 * 
 * The app is created for learning purpose,I will try to create the app
 * with following details and will focus on the functioning of following
 * 1. The app will store the data in database using PDO
 * 2. The app will be able to export the data in xml files
 *   
 * */
 
?>

<html>
	<head>
		<title>To Do App</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
	
	<?php echo date('l \t\h\e jS M,Y'); ?>
	
	 <form name="input" action="fetch_data.php" method="get">
		<input type="submit" value="Check Tasks">
	</form>


<h2>Add a Task</h2>
 	<form action="insert_data.php" method = "post"> 
		Task: <br /> <input type="text" name="task" /><br />
<br />
		Target Date: <br /> <input type="text" name="target_date" /><br />
<br />
<input type="submit" />
	</form>	
	<div id="log_container">
		
	</div>
	</body>
</html>
