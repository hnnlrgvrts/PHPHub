// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	console.log('do I even get loaded');
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		
		// One of either buttons was clicked
		var reqid = $(this).siblings('#request_id').val(),
			name = this.name,
			dataString = "id=" + reqid,
			//url = "index.php?page=vote&projectid=" + $('.projectid').attr('id') + "&requestid=" + reqid;
			url = "resources/pages/vote.php"

		console.log(reqid, name, dataString, url);
		
		//3. Send an update for the related feature request to the db using ajax
		$.ajax({
			method: "POST",
			url: url, 
			data:{dataString} 
		}).done(function(res){
			console.log(res)
		});
		console.log("test");
		// Prevent default submit button action (= reload page and POST form)
		e.preventDefault();
		return false; //AVOID PAGE RELOAD WHEN CLICKING ON ONE OF THE BUTTONS
	});
});