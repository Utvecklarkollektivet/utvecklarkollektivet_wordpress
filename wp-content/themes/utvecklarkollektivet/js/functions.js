function hide_message_click() {
	$('#uk-message').on('click', function() {
		$(this).hide();
	});
}

function show_error_message(message) {
	$('#uk-message').show();
	$('#uk-message').empty();
	$('#uk-message').css('background', '#80141e');
	$('#uk-message').append("<p>"+message+"</p>");
}

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
				show_error_message(data.message);
				hide_message();
			}
		} 
	});
}