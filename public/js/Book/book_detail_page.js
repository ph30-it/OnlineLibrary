//Override Update function
UpdateElement.prototype.Update = function(){
	let quantity_field = $("#quantity-field");

	if(this.data.quantity){
		$(quantity_field).html("Remaining: " + this.data.quantity + " books"); 
	}
	else{
		console.log("Please send quantity property in data package [PaymentController]");
	}

	$(this.btt).html("Added");
	$(this.btt).attr("disabled","disabled");
	$(this.btt).css("cursor","not-allowed");
}