$(document).ready(function(){
	$(".picture-slider-container").slick({
		slidesToShow:1,
		slidesToScroll:1,
		autoplay:true,
		autoplaySpeed: 1500,
		arrows:false
	});

	$(".book-list").slick({
		slidesToShow:6,
		slidesToScroll:2,
		arrows:true,
		infinite:true,
		variableWidth:true,
		responsive:[
		{
			breakpoint: 768,
			settings:{
				arrows:false,
				slidesToShow:1,
				slidesToScroll:1,
				variableWidth:false
			}
		}
		]
	});
});

//Override Update function
UpdateElement.prototype.Update = function(){
	let quantity_field = $(this.btt).parent().parent().find(".book-quantity");

	if(this.data.quantity){
		$(quantity_field).html("Remaining: " + this.data.quantity + " books"); 
	}
	else{
		console.log("Please send quantity property in data package [PaymentController]");
	}
}