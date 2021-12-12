<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Connects to database
// $db = mysqli_connect('localhost','admin','admin','checkin');
$db = mysqli_connect('localhost','root','','checkin');


 //Checks if there is a connection error
if(mysqli_connect_errno()) {
	echo 'Database connection failed with following errors: ' . mysqli_connect_error();
	die();
}
session_start();

// SOME FUNCTIONS

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
