<?php
include('init.php');

include('mail_it.php');

if (isset($_POST['e_invite']) && $_POST['e_invite'] != "")
{
    $email=$mysqli->escape_string($_POST['e_invite']);


    if ($_POST['napomena']!='') {
        $sent_msg=$mysqli->escape_string($_POST['napomena']);
        $sent_msg.='<br>';
    } else {$sent_msg="Pozvani ste da proverite aplikaciju...<br>";}
    
    $sent_from=$mysqli->escape_string($_POST['user']);


if (mail_invite($email, $sent_from, $sent_msg) =='OK')
{
    date_default_timezone_set('Europe/Belgrade');
    setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));

    $register_date = date('Y-m-d H:i:s');

    $_SESSION['sucess_message'] ='Uspešno poslata preporuka na '.$email. '.';

    echo $sql = "INSERT INTO poziv (sent_from, email, napomena, date_sent)" 
    ."VALUES ('$sent_from', '$email', '$sent_msg', '$register_date')";

if (!$mysqli->query($sql))
{
    $_SESSION['fail_message'] ='Problem sa upisom preporuke u bazu ('.$email. ').';
} 
    header ('Location: ./profile.php');
    exit ();
}
else {
    $_SESSION['fail_message'] ='Problem sa preporukom na '.$email. '.';
    header ('Location: ./profile.php');
    exit ();

}
}
