/*$(document).ready(function(){
	$("select#pagination-select").change(function(){
		let selectedItem = $(this).val();
		let categoryId = $(this).attr("data-category-id");
		let token = $("meta[name='csrf-token']").attr("content");
		$.ajax({
			type:'POST',
			url:'/category/'+categoryId,
			data:{
				'category':categoryId,
				'pagination':selectedItem,
				'_token':token
			},
			success:function(data){
				$("#paginate").empty().append($(data).hide().fadeIn(500));
			},
			error:function(jqXHR,exception){
				console.log(jqXHR.responseText);
			}
		});
	});
	$("select#orderByName-select").change(function(){
		let selectedItem = $(this).val();
		let categoryId = $(this).attr("data-category-id");
		let token = $("meta[name='csrf-token']").attr("content");
		$.ajax({
			type:'POST',
			url:'/category/'+categoryId,
			data:{
				'category':categoryId,
				'orderByName':selectedItem,
				'_token':token
			},
			success:function(data){
				$("#paginate").empty().append($(data).hide().fadeIn(500));
			},
			error:function(jqXHR,exception){
				console.log(jqXHR.responseText);
			}
		});
	});
});*/

$(document).ready(function(){
	$("form").submit(function( event ) {
		event.preventDefault();
		let orderby = $("select#orderByName-select").val();
		let paginate = $("select#pagination-select").val();
		let categoryId = $(this).attr("data-category-id");
		let token = $("meta[name='csrf-token']").attr("content");
		$.ajax({
			type:'POST',
			url:'/category/'+categoryId,
			data:{
				'category':categoryId,
				'pagination':paginate,
				'orderByName':orderby,
				'_token':token
			},
			success:function(data){
				$("#paginate").empty().append($(data).hide().fadeIn(500));
			},
			error:function(jqXHR,exception){
				console.log(jqXHR.responseText);
			}
		});
	});
});