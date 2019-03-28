$(document).ready(function(){
	$(".get-book-btt").on('click',function(){
		let book_id = $(this).attr("data-book-id");
		$.ajax({
			type:'GET',
			url:'/cart/add_to_cart/' + book_id,
			success:function(data){
				if(data == 1){
					let message = new MessageOnTop("Book was added to cart");
					message.Create(message.CONFIG.SUCCESS_BOOTSTRAP_CLASS);
					return;
				}
				if(data == -2){
					let message = new MessageOnTop("Maybe this book was added");
					message.Create(message.CONFIG.DANGER_BOOTSTRAP_CLASS);
					return;
				}

				if(data == -1){
					let message = new MessageOnTop("This book is not exist");
					message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
					return;
				}
				if(data == -3){
					let message = new MessageOnTop("Maximum 5 books in once");
					message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
					return;
				}
			},
			error:function(jqXHR,exception){
				console.log(jqXHR.responseText);
			}
		});
	});
});