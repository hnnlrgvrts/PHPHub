// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		// One of either buttons was clicked
		//2. Get which button has been clicked (up-/downvote)
		var vote = this.name;
		var score = $(this).siblings('.feature-score').text();

		if (name === 'upvote') {
			// Feature request has been upvoted
			score++;
		} else if (name === 'downvote') {
			// Feature request has been downvoted
			score--;
		}

	});
	//3. Send an update for the related feature request to the db using ajax
	//4. Handle callback (ajax call was either a success or a fail)
	//5. If successful: +1/-1 to feature request total votes
	//6. If fail: show error message on the screen
});