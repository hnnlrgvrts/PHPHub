// Wait for DOM (= full document) to be loaded
$(document).ready(function () {
	console.log('do I even get loaded');
	//1. Detect vote button click
	$('button', '.vote-buttons').on('click', function (e) {
		
		// One of either buttons was clicked
		var reqid = $(this).siblings('#request_id').val(),
		    uid = $("#hiddenUserId").val(),
			name = this.name,
			//url = "index.php?page=vote&projectid=" + $('.projectid').attr('id') + "&requestid=" + reqid;
			url = "resources/pages/vote.php"

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
				var newScore = parseInt($(this).siblings('feature-score').html())+1;
				$(this).siblings('feature-score').html(newScore);
			}else{
				var newScore = parseInt($(this).siblings('feature-score').html())-1;
				$(this).siblings('feature-score').html(newScore);
			}
			console.log(newScore);
		});
		console.log("test");
		// Prevent default submit button action (= reload page and POST form)
		e.preventDefault();
		return false; //AVOID PAGE RELOAD WHEN CLICKING ON ONE OF THE BUTTONS
	});
});