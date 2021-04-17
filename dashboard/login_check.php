<?php
// Login check

function logged_in() {
	return (isset($_SESSION['logged_in'])) ? true : false;
}

function protect_page() {
	if (logged_in() === false) {
		header ('Location: login.php');
		exit ();
	}
}
