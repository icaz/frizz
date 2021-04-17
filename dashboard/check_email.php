<?php 
// Ajax calls this NAME CHECK code to execute
if(isset($_POST["email"])){
	session_start();

	include("db.php");
	$email = $mysqli->escape_string($_POST['email']);
	$result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
	echo $_POST['email'];
	if ($result->num_rows > 0)
	{
		echo 1;
	}
	elseif ($result->num_rows == 0)
	{
		echo 0;
	}
}
?>
