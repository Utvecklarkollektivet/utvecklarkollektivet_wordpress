function do_login(input_data) {
	$.ajax({ 
		type: "POST", 
		url:  "",
		dataType: "json",
		data: input_data, 
		success: function(data){ 
			data2 = data;
			if(data.success) {
				window.location.replace(window.location.pathname);
			} else {
				$('.login-error').append("<p>"+data.message+"</p>");
			}
		} 
	});
}