$(document).ready(function(){
$(".picture-slider-container").slick({
		slidesToShow:1,
		slidesToScroll:1,
		autoplay: true,
		autoplaySpeed: 1500,
		arrows: false,
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