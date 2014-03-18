$(document).ready(function(){
	var formhtml =  "logreq=1";
	var postURL= "fetch_data.php";
	$.ajax({
		type: "GET",
		url: postURL,
		data: formhtml,
		success: function(html){
			var output= "<table><tbody><thead><th>task_name</th><th>Date</th></thead>";
			var qryResult = $.parseJSON(html);
			for (var i in qryResult.tasks){
				output+="<tr><td>" +  qryResult.tasks[i].task + "</td><td>" + qryResult.tasks[i].target_date+"</td></tr>";
			}
			$("#log_container").html(output);
		},
		error: function (html) {
			alert("Oops...Something went terribly wrong");
		}
	});
});
