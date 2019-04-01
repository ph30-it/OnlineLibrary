+$("#comment-submit").on('click',function(event){
	let book_id = $('#book_id_input').val();
	var content = $("#user_comment_content").val();
	let token = $("meta[name='csrf-token']").attr("content");
	var username = $("#user-info").text();

	if(content == ""){
		let message = new MessageOnTop("Nothing to comment");
		message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
		return;
	}

	$.ajax({
		type:'POST',
		url:'/add_comment',
		data:{
			'book_id':book_id,
			'content':content,
			'_token':token
		},
		success:function(data){
			let comment = JSON.parse(data);
			$("#user_comment_content").text("");
			let added = $('<div class="comment-container"><div class="user-info">' + username + ' commented at ' + comment.created_at + '</div><textarea class="comment-content" readonly>' + content + '</textarea></div><hr>');
			$("#comment-list").prepend(added);
		},
		error:function(jqXHR,exception){
			console.log(jqXHR.responseText);
		}
	});
});

$("input[name='star']").change(function(){
	let starNumber = $("input[name='star']:checked").val();
	let bookId = $("#book_id_input").val();
	let token = $("meta[name='csrf-token']").attr("content");

	$.ajax({
		type:'POST',
		url:'/add_star',
		data:{
			'book_id':bookId,
			'star_number':starNumber,
			'_token':token
		},
		success:function(data){
			let message = new MessageOnTop("Nothing to comment");
			message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
			return;
		},
		error:function(jqXHR,exception){
			console.log(jqXHR.responseText);
		}
	});
});

$("input[name='star']").each(function(){
	let value = $(this).val();
	emoji = '&#x1F60A;';

	if(value == 1) emoji = '&#x1F620;';
	if(value == 2) emoji = '&#x1F61E;';
	if(value == 3) emoji = '&#x1F610;';
	if(value == 4) emoji = '&#x1F60A;';
	if(value == 5) emoji = '&#x1F603;';

	$("label[for='" + $(this).attr("id") + "']").html(emoji);
});