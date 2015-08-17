// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	// console.log('do I even get loaded');
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		
		// One of either buttons was clicked
		var reqid = $(this).siblings('#request_id').val(),
		    uid = $("#hiddenUserId").val(),
			name = this.name,
			//url = "index.php?page=vote&projectid=" + $('.projectid').attr('id') + "&requestid=" + reqid;
			url = "resources/pages/vote.php",
			targetScore = $(this).siblings('.feature-score'),
			clickedButton = $(this),
			siblingButton = $(this).siblings('.btn'),
			score = parseInt($(this).siblings('.feature-score').html());
		//3. Send an update for the related feature request to the db using ajax
		$.ajax({
			method: "POST",
			url: url, 
			data:{"userid":uid,
				  "requestid":reqid,
				  "type":name} 
		}).done(function(res){
			console.log(res);
			if(res.type == 'upvote'){
				score++;
				targetScore.html(score);
			}else{
				score--;
				targetScore.html(score);
			}
			clickedButton.attr('disabled', true);
			siblingButton.attr('disabled', true);
		});
		// console.log("test");
		// Prevent default submit button action (= reload page and POST form)
		e.preventDefault();
		return false; //AVOID PAGE RELOAD WHEN CLICKING ON ONE OF THE BUTTONS
	});
});