<?php 
    require 'db.php';
    session_start();

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = $mysqli->escape_string($_GET['email']); 
        $hash = $mysqli->escape_string($_GET['hash']); 
    
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email' AND hash='$hash' AND active='0'");

        if ($result->num_rows == 0)
        { 
            $_SESSION['message'] = "<div class='info-alert'>Account has already been activated or the URL is invalid!</div>";
            header("location: error.php");
        }
        elseif ($result->num_rows == 1) 
        {
            $_SESSION['message'] = "<div class='info-success'>Your account has been activated!</div>";
        
            $mysqli->query("UPDATE user SET active='1' WHERE email='$email'") or die($mysqli->error);
            $_SESSION['email'] = $email;
            header("location: activate_success.php");
        }
    }
    else
    {
        $_SESSION['message'] = "<div class='info-alert'>Invalid parameters provided for account verification!</div>";
        header("location: error.php");
    }
?>