(function($) {
	hide_message_click();

	$('#login-submit-button').on('click', function(e) {
		e.preventDefault();
		var input_data = $('#login-form').serialize();
		do_login(input_data);
	});
})(jQuery);