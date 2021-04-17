<?php
// Mail functions --- REGISTER -- CONFIRMATION EMAIL
function mail_register($email, $name, $hash) {
// Site name
	$site_url="http://cal.rs";
// Email account
	$email_host = "u.nisu.rs";
	$email_sender = "Admin tim - ".$site_url;
	$email_username = "noreply@u.nisu.rs";
	$email_pass = "_Icaz2020";

	require_once('class.phpmailer.php');
	include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	$subject= "Registracija korisnika na sajtu: ".$site_url;
	$body = '<html>
	<head>
		<title>Registracija korisnika</title>
		<style type="text/css">
			body 
			{
				background: #c1bdba;
				font-family: "Titillium Web", sans-serif;
			}
			a
			{
				text-decoration: none;
				color: #1ab188;
				-webkit-transition: .5s ease;
				transition: .5s ease;
			}
			a:hover
			{
				color: #179b77;
			}
			h1
			{
				font-size: 18px;
				text-align: center;
				color: #ffffff;
				font-weight: 300;
			}
			h2
			{
				text-align: center;
				color: #1ab188;
				font-weight: 1000;
			}
			span
			{
				color: #1ab188;
				font-weight: bold;
			}
			p
			{
				text-align: center;
				color: #ffffff;
				margin: 0px 0px 50px 0px;
				padding-top: 2px;
            }
			.form
			{
				background: rgba(19, 35, 47, 0.9); 
				padding: 40px;
				max-width: 600px;
				margin: 40px auto;
				border-radius: 4px;
				box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
			}
			.button
			{
				font-family: "Titillium Web", sans-serif;
				border: 0;
				outline: none;
				border-radius: 0;
				padding: 15px 0;
				margin-top: 30px;
				font-size: 2rem;
				font-weight: 600;
				text-transform: uppercase;
				letter-spacing: .1em;
				background: #1ab188;
				color: #ffffff;
				-webkit-transition: all 0.5s ease;
				transition: all 0.5s ease;
				-webkit-appearance: none;
			}
			.button:hover, .button:focus
			{
				background: #179b77;
			}
			.button-block
			{
				display: block;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="form">
			<h1 style="font-size: 20px; text-align: left;">Pozdrav za korisnika '.$name.'</h1>,<br>
	
			<h1>Hvala na registraciji na sajtu.<br>
	
			Kliknite na dugme da ni ste aktivirali nalog:<br></h1>
	
			<a href="'.$site_url.'/dashboard/verify.php?email='.$email.'&hash='.$hash.'"><button class="button button-block">Aktiviraj nalog</button></a>
		</div>
	</body>
	</html>';
	
	// HOSTING MAIL
	
		$mail = new PHPMailer();
		$mail->CharSet = "utf-8";

		//Enable SMTP debugging. 
		$mail->SMTPDebug = 0;
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();
		//Set SMTP host name                          
		$mail->Host = $email_host;
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;
		//Provide username and password     
		$mail->Username = $email_username;
		$mail->Password = $email_pass;
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "ssl";
		//Set TCP port to connect to 
		$mail->Port = 465;
		$mail->setFrom($email_username, $email_sender);
		//$mail->FromName = "Sajt";
		$mail->addAddress($email, $name);
		$mail->AddCC('icaz.mailg@gmail.com', 'Ivan Zivkovic');
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->MsgHTML($body."\n.");
		$mail->AltBody = "This is the plain text version of the email content";

        if (!$mail->send()) {
            $mail_reg_status = "Mailer Error: " . $mail->ErrorInfo;
        }
        else {
            $mail_reg_status = 'OK';
        }
        return  $mail_reg_status;

		
}

// Mail functions --- ORDER MAIL

function mail_order($order_id, $ordered, $ordered_when, $name, $phone, $email, $address, $store_status_detail) {

    // Site name
        $site_url="http://cal.rs";
    
    // Email account
        $email_host = "u.nisu.rs";
        $email_sender = "Admin tim - ".$site_url;
        $email_username = "noreply@u.nisu.rs";
        $email_pass = "_Icaz2020";
        
    
        require_once('class.phpmailer.php');
        include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
        $subject= "Nadrudžbina br.".$order_id." sa sajta - ".$site_url;
        $body = '
        <html>
        <head>
            <title>Nardžbina sa sajta</title>
            <style type="text/css">
                body {
                    background: #c1bdba;
                    font-family: "Titillium Web", sans-serif;
                }
                a {
                    text-decoration: none;
                    color: #1ab188;
                    -webkit-transition: .5s ease;
                    transition: .5s ease;
                }
                a:hover {
                    color: #179b77;
                }
                h1 {
                    font-size: 22px;
                    text-align: center;
                    color: #ffffff;
                    font-weight: 300;
                    margin-bottom: 5px;
                    line-height: 1em;
                }
                h2 {
                    text-align: center;
                    color: #1ab188;
                    font-weight: 1000;
                    margin-bottom: 5px;
                }
                h3 {
                    text-align: center;
                    color: #ffffff;
                    font-weight: 600;
                    margin-bottom: 5px;
                    margin-top: 5px;
                    line-height: 1em;
                }
                span {
                    color: #1ab188;
                    font-weight: bold;
                }
                p {
                    text-align: center;
                    color: #ffffff;
                    margin: 0px 0px 50px 0px;
                    padding-top: 2px;
                }
                .form {
                    background: rgba(19, 35, 47, 0.9);
                    padding: 40px;
                    max-width: 600px;
                    margin: 40px auto;
                    border-radius: 4px;
                    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
                }
                .button {
                    font-family: "Titillium Web", sans-serif;
                    border: 0;
                    outline: none;
                    border-radius: 0;
                    padding: 15px 0;
                    margin-top: 30px;
                    font-size: 2rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: .1em;
                    background: #1ab188;
                    color: #ffffff;
                    -webkit-transition: all 0.5s ease;
                    transition: all 0.5s ease;
                    -webkit-appearance: none;
                }
                .button:hover,
                .button:focus {
                    background: #179b77;
                }
                .button-block {
                    display: block;
                    width: 100%;
                }
                table {
                    margin: auto;
                    border-collapse: collapse;
                    border-spacing: 0;
                    color: #ffffff;
                    font-weight: 300;
                    max-width: 600px;
                    min-width: 400px;
        
                }
                th,
                td {
                    border-collapse: collapse;
                    border-spacing: 0;
                    border-bottom: 1px solid white;
                    color: #ffffff;
                    font-weight: 300;
                }
            </style>
        </head>
        
        <body>
        
            <div class="form">
            <h2>Narudžbina sa sajta - br.'.$order_id . '<br></h2><hr>
            <h1 style="font-size: 20px;">Datum narudžbine:<br></h1>
            <h3>'.$ordered . ' ' . $ordered_when . 'H</h3>
            <hr>
            <table>
                <tr>
                    <td>Ime i prezime:</td>
                    <td><h3>'.$name.'</h3></td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td><h3>'.$phone.'</h3></td>
                </tr>
                <tr>
                    <td>E-mail adresa:</td>
                    <td><h3>'.$email.'</h3></td>
                </tr>
                <tr>
                    <td>Adresa za dostavu:</td>
                    <td><h3>'.$address.'<h3></td>
                </tr>
            </table>       
            <hr>'.$store_status_detail.'<hr>
                    <a href="'.$site_url.'/dashboard/ord_process.php?order_id='.$order_id.'"><button class="button button-block">Spremi narudžbinu</button></a>
        </div>
    </body>
    
    </html>';
        
        // HOSTING MAIL
        
            $mail = new PHPMailer();
            $mail->CharSet = "utf-8";
    
            //Enable SMTP debugging. 
            $mail->SMTPDebug = 0;
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name                          
            $mail->Host = $email_host;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = $email_username;
            $mail->Password = $email_pass;
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "ssl";
            //Set TCP port to connect to 
            $mail->Port = 465;
            $mail->setFrom($email_username, $email_sender);
            //$mail->FromName = "Sajt";
            $mail->addAddress($email, $name);
            $mail->AddCC('icaz.mailg@gmail.com', 'Ivan Zivkovic');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->MsgHTML($body."\n.");
            $mail->AltBody = "This is the plain text version of the email content";
            if (!$mail->send()) {
                $mail_ord_status = "Mailer Error: " . $mail->ErrorInfo;
            }
            else {
                $mail_ord_status = 'OK';
            }
            return  $mail_ord_status;
    }



 /////////////////////////////////// CONTACT EMAIL FROM CONTACT_IT.PHP//////////////
 
 
 // Mail functions --- CONTACT_US --  EMAIL
function mail_comment($name, $phone, $email, $komentar) {

    // Site name
        $site_url="http://cal.rs";
    
    // Email account
        $email_host = "u.nisu.rs";
        $email_sender = "Admin tim - ".$site_url;
        $email_username = "noreply@u.nisu.rs";
        $email_pass = "_Icaz2020";
    
        require_once('class.phpmailer.php');
        include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $subject= "Komentar/upit korisnika na sajtu: ".$site_url;
        $body = '<html>
        <head>
            <title>Komentar/upit korisnika</title>
            <style type="text/css">
                body 
                {
                    background: #c1bdba;
                    font-family: "Titillium Web", sans-serif;
                }
                a
                {
                    text-decoration: none;
                    color: #1ab188;
                    -webkit-transition: .5s ease;
                    transition: .5s ease;
                }
                a:hover
                {
                    color: #179b77;
                }
                h1
                {
                    font-size: 18px;
                    text-align: center;
                    color: #ffffff;
                    font-weight: 300;
                }
                h2
                {
                    text-align: center;
                    color: #1ab188;
                    font-weight: 1000;
                }
                span
                {
                    color: #1ab188;
                    font-weight: bold;
                }
                p
                {
                    text-align: center;
                    color: #ffffff;
                    margin: 0px 0px 50px 0px;
                    padding-top: 2px;
                }
                .form
                {
                    background: rgba(19, 35, 47, 0.9); 
                    padding: 40px;
                    max-width: 600px;
                    margin: 40px auto;
                    border-radius: 4px;
                    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
                }
                .button
                {
                    font-family: "Titillium Web", sans-serif;
                    border: 0;
                    outline: none;
                    border-radius: 0;
                    padding: 15px 0;
                    margin-top: 30px;
                    font-size: 2rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: .1em;
                    background: #1ab188;
                    color: #ffffff;
                    -webkit-transition: all 0.5s ease;
                    transition: all 0.5s ease;
                    -webkit-appearance: none;
                }
                .button:hover, .button:focus
                {
                    background: #179b77;
                }
                .button-block
                {
                    display: block;
                    width: 100%;
                }
                table {
                    margin: auto;
                    border-collapse: collapse;
                    border-spacing: 0;
                    color: #ffffff;
                    font-weight: 300;
                    max-width: 600px;
                    min-width: 400px;
        
                }
                th,
                td {
                    border-collapse: collapse;
                    border-spacing: 0;
                    border-bottom: 1px solid white;
                    color: #ffffff;
                    font-weight: 300;
                }            </style>
        </head>
        <body>
            <div class="form">
                <h1 style="font-size: 20px; text-align: left;">Poruka od korisnika '.$name.'</h1>,<br>
        
                <table>
                <tr>
                    <td>Ime i prezime:</td>
                    <td><h3>'.$name.'</h3></td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td><h3>'.$phone.'</h3></td>
                </tr>
                <tr>
                    <td>E-mail adresa:</td>
                    <td><h3>'.$email.'</h3></td>
                </tr>
                <tr>
                    <td>Poruka:</td>
                    <td><h3>'.$komentar.'<h3></td>
                </tr>
            </table>    
            </div>
        </body>
        </html>';
        
        // HOSTING MAIL
        
            $mail = new PHPMailer();
            $mail->CharSet = "utf-8";
    
            //Enable SMTP debugging. 
            $mail->SMTPDebug = 0;
            //Set PHPMailer to use SMTP.
            $mail->isSMTP();
            //Set SMTP host name                          
            $mail->Host = $email_host;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = true;
            //Provide username and password     
            $mail->Username = $email_username;
            $mail->Password = $email_pass;
            //If SMTP requires TLS encryption then set it
            $mail->SMTPSecure = "ssl";
            //Set TCP port to connect to 
            $mail->Port = 465;
            $mail->setFrom($email_username, $email_sender);
            //$mail->FromName = "Sajt";
            $mail->addAddress($email, $name);
            $mail->AddCC('icaz.mailg@gmail.com', 'Ivan Zivkovic');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->MsgHTML($body."\n.");
            $mail->AltBody = "This is the plain text version of the email content";
    
            if (!$mail->send()) {
                $mail_com_status = "Mailer Error: " . $mail->ErrorInfo;
            }
            else {
                $mail_com_status = 'OK';
            }
            return  $mail_com_status;
    
            
    }
    
?>