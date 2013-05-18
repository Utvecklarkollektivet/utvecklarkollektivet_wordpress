<?php

function check_if_user_tries_to_login() {
	if ($_POST['action'] === 'login_action') {
	    // see the codex for wp_signon()
	    $result = wp_signon();

	    if(is_wp_error($result)) {
	        echo json_encode(array('success' => false, 'message' => 'Fel användarnamn / lösenord'));
	    }
	    else {
	        // redirect back to the requested page if login was successful    
	        echo json_encode(array('success' => true));
	    }
	    exit;
	}
}
add_action('init', 'check_if_user_tries_to_login');