"use strict"; // no stupid mistake here !!!!

$(document).ready(function(){
	$('.hamburger').on('click', function () {
	    $(this).toggleClass('is-active');
	    $( "#navbar-mobile" ).slideToggle('500');
	});
});

$(".get-book-btt").on('click',function(){
	let book_id = $(this).attr("data-book-id");
	
	var that = this;

	$.ajax({
		type:'GET',
		url:'/get_this_book_with_id=' + book_id,
		success:function(data){
			let dataObj = JSON.parse(data);
			
			if(dataObj.error == true){
				let message = new MessageOnTop(dataObj.errMessage);
				message.Create(message.CONFIG.ALERT_BOOTSTRAP_CLASS);
				return;
			}

			let update = new UpdateElement(dataObj);
			update.GetButtonToDependOn(that);
			update.Update();
		},
		error:function(jqXHR,exception){
			console.log(jqXHR.responseText);
		}
	});
});

$("#cart-btt").on('click',function(){
	window.location.href = "/user?section=1";
});

function UpdateElement(data){
	this.data = data;
}

UpdateElement.prototype.GetButtonToDependOn = function(btt){
	this.btt = btt;
}

function MessageOnTop(message){
	this.message = message;
}

MessageOnTop.prototype.CONFIG = {
	ALERT_BOOTSTRAP_BASIC: "alert alert-dismissible",
	ALERT_BOOTSTRAP_CLASS: "alert-warning",
	DANGER_BOOTSTRAP_CLASS: "alert-danger",
	timeToExist: 2000,
	effectTime:500,
	usingEffect:true
}

MessageOnTop.prototype.Create = function(type){
	var div = document.createElement("div");

	$(div).addClass(this.CONFIG.ALERT_BOOTSTRAP_BASIC + " " +  type);
	
	$(div).addClass("fixed-top");

	$(div).html(this.message);

	var closeButton = document.createElement("button");
	$(closeButton).attr("type","button");
	$(closeButton).addClass("close");
	$(closeButton).attr("data-dismiss","alert");
	$(closeButton).html("&times;");

	$(div).append(closeButton);

	$('body').append(div);

	var that = this;

	setTimeout(function(){
		that.Destroy(div);
	},this.CONFIG.timeToExist);
}

MessageOnTop.prototype.Destroy = function(messageContainer){
	if(this.CONFIG.usingEffect){
		$(messageContainer).fadeOut(this.CONFIG.effectTime,function(){
			$(messageContainer).remove();
		});
	}else{
		$(messageContainer).remove();
	}
}