/*Helper Functions*/
var UrlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results==null) {
       return null;
    }
    return decodeURI(results[1]) || 0;
}

 //analyze url param 
var LOADING_SECTION = {
	USER_PROFILE:0,
	USER_CART_SECTION:1,
	USER_HISTORY_SECTION:2
}

let loadingType = UrlParam("section") || 0;

function loadSectionByID(id){
	$.ajax({
		type:'GET',
		url:'/loading_sub_page=' + loadingType,
		success:function(data){
			$("#page-wrapper").empty();
			$("#page-wrapper").append($(data).hide().fadeIn(1000));
			if(id == 1){
				InitCartPageEvent();
			}
		},
		error:function(jqXHR,exception){
			console.log(jqXHR.responseText);
		}
	});
}

var InitCartPageEvent = function(){
	$("#confirm-ordered-books").on('click',function(){
		let child = $("#ordered-book-list").find(".ordered-book-container");
		if(child.length == 0){
			alert('Nothing to order');
		}else{
			$.ajax({
				type:'GET',
				url:'/confirm_ordered_book',
				success:function(data){
					$("#ordered-book-list").empty();
					alert('Ordered');
				},
				error:function(jqXHR,exception){
					console.log(jqXHR.responseText);
				}
			});
		}
	});
}

loadSectionByID(loadingType);


