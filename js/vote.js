// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		// Prevent default submit button action (= reload page and POST form)
		e.preventDefault();
		
		// One of either buttons was clicked
		var id = $(this).siblings('#fr-id').val(),
			name = this.name,
			dataString = "id=" + id,
			url = "index.php?page=vote.php&projectid=";

		//3. Send an update for the related feature request to the db using ajax
		$.ajax({
			type: "POST", 				// type of the ajax call
			url: url,					// url to send this call to
			data: dataString,			// data to send with the call
			//4. Handle callback with the proper function (either success/fail)
			success: function (msg) {	
				// function executes when the call was successful (= callback)
				// update the total voting score of the feature request
				$(this).siblings('.feature-score').text(msg);
			},
			error: function (e) {
				//function executes when the call was a failure (= callback)
				console.log("Ajax call failed, here's what's returned: ", e);				
			}
		});

		return (false); //AVOID PAGE RELOAD WHEN CLICKING ON ONE OF THE BUTTONS
	});
});