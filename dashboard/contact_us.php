<?php
include('init.php');

include('mail_it.php');

if ((isset($_POST['submit']) && $_POST['submit'] == "1"))
{
    $name = $mysqli->escape_string($_POST['name']);
    $phone = $mysqli->escape_string($_POST['phone']);
    $komentar = $mysqli->escape_string($_POST['komentar']);
    if ((isset($_POST['email']) && $_POST['email'] != "")) {
        $email = $mysqli->escape_string($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = 'No valid email';
        }
    } else {
        $email = 'No valid email';
    }

    

    if (mail_comment($name, $phone, $email, $komentar)=='OK')
    {
        $_SESSION['sucess_message'] ='Komentar sa sajta uspešno poslat';
        header ('Location: ../kontakt.php');
        exit ();
    }
    else {
        $_SESSION['fail_message'] ='Problem sa komentarom sa sajta!';
        header ('Location: ../kontakt.php');
        exit ();
    }

}
