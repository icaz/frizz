<?php 
    require 'db.php';
    session_start();

// Site name
echo $site_url."<br>";
echo $email_host."<br>";
echo $email_sender."<br>";
echo $email_username."<br>";
echo $email_pass."<br>";

echo $email="icaz.mailg@gmail.com";echo "<br>";
echo $first_name="Ivan";echo "<br>";
echo $id="8";echo "<br>";
echo $hash="e205ee2a5de471a70c1fd1b46033a75f";echo "<br>";

if (mail_register($email, $first_name, $id, $hash)) {
    echo "OK";
}
else {echo "not OK";}

