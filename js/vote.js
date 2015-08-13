// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		// One of either buttons was clicked
		var id = $(this).siblings('#fr-id').val(),
			name = this.name,
			dataString = "id=" + id,
			url = "resources/pages/";

		//2. Get which button has been clicked (up-/downvote)
		if (name === "upvote") {
			// Feature request has been upvoted
			url += "upvote.php";
		} else if (name === "downvote") {
			// Feature request has been downvoted
			url += "downvote.php";
		}

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
				
			}
		});

		return (false); //AVOID PAGE RELOAD WHEN CLICKING ON ONE OF THE BUTTONS
	});
});

/* 
when
	user clicks button
check (expand at later point to include switchable votes)
	if user has already voted
		cancel (= disable buttons)
	else 
		insert record into
			voting with
				id of logged in user
				id of feature request
				1/0 for up-/downvote

when
	projects page load
	select all votes of
		loaded project
		determine score of each request
			count all upvotes
			count all downvotes
			upvotes - downvotes = score
		
*/