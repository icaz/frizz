<?php


// Mail functions
function mail_order($order_id) {

    // Site name
        $site_url="http://cal.rs";
    
    // Email account
        $email_host = "u.nisu.rs";
        $email_sender = "Admin tim - ".$site_url;
        $email_username = "noreply@u.nisu.rs";
        $email_pass = "noglasi8289";
    
        require_once('class.phpmailer.php');
        include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
        $name = $name;
        $subject= "Narudžbina sa sajta: ".$site_url;
        $body = '<html>
        <head>
            <title>Dobili ste narudžbinu</title>
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
                <h1>Narudžbina sa sajta: '.$site_url.'<br>
        
                Kliknite na dugme da ni ste pregledali narudžbinu<br></h1>
        
                <a href="'.$site_url.'/dashboard/view_order.php?order_id='.$order_id.'"><button class="button button-block">Pogledaj narudžbinu</button></a>
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
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
            else {
                    echo 'Uspešno je poslat mail.';
            }
            
    }
    