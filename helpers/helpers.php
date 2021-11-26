<?php 
function sanitize($dirty) {
	return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}


function display_errors($errors){
	$display = '<ul style="margin-top: 60px;" class="bg-danger">';
	foreach($errors as $error){
		$display .= '<li class="text-danger">'.$error.'</li>';
	}
	$display .= '</ul>';
	return $display; 	
}

function login($user_id){
	$_SESSION['SBUser'] = $user_id;
	global $db;
	header('Location: index.php');
}

function is_logged_in(){
	if(isset($_SESSION['SBUser']) && $_SESSION['SBUser'] > 0){
		return true;
	}
	return false;
}

function login_error_redirect($url = 'login.php'){
	$_SESSION['error_flash'] = 'You must be logged in to access that page.';
	header('Location: '.$url);
}