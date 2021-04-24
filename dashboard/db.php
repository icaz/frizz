<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'frizz';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
	
	/////////////////// SAJT ///////////////////////////
	$sajt="firzeri.u.nisu.rs";
	/////////////////// SAJT ///////////////////////////


// Login check
if(!function_exists('logged_in')){
    function logged_in(){
	return (isset($_SESSION['logged_in'])) ? true : false;
    }
}
if(!function_exists('protect_page')){
	function protect_page()
	{
		/////////////////// SAJT ///////////////////////////
		$sajt="firzeri.u.nisu.rs";
		/////////////////// SAJT ///////////////////////////

		if (logged_in() === false) {
			header ('Location: login.php');
			exit ();
		} elseif (logged_in() === true) {
			if (isset($_SESSION['site']) && $_SESSION['site'] == $sajt) {
				header('Location: index.php');
				exit();
			  } else {
				header('Location: login.php');
				exit();
			  }
		}
	}
}
