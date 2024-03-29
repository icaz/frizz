<?php 
    require 'db.php';
    session_start();

    if ($_SESSION['logged_in'] !=1 )
    {
        $_SESSION['message']="<div class='info-alert'>You must log in before changing your password!</div>";
        header("location: error.php"); 
    }

    if (isset($_POST['change']) && $_POST['new_password'] != "" && $_POST['confirm_new_password'] && $_POST['current_password'] != "")
    {   
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        $user = $result->fetch_assoc();

        if (password_verify($_POST['current_password'], $user['password']))
        {
            $new_password = $mysqli->escape_string(password_hash($_POST['new_password'], PASSWORD_BCRYPT));
            $hash = $mysqli->escape_string(md5(rand(0,1000)));
            $sql = "UPDATE user SET password='$new_password', hash='$hash' WHERE email='$email'";

            if ($mysqli->query($sql))
            {
                $_SESSION['message'] = "<div class='info-success'>Your password has been changed successfully!</div>";
                header("location: success.php");    
            }
        }
        else
        {
            $_SESSION['message'] = "<div class='info-alert'>Please enter correct current password!</div>";
            header("Location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Your Password</title>
    <?php include 'css/css.html'; ?>
    <script src="js/validation.js" type="text/javascript"></script>
</head>
<body>
    <div class="form">
        <h1>Change Your Password</h1>
        <form id="changeform" name="changeform" action="changepassword.php" onsubmit="return change_validation();" method="post">
            <div class="field-wrap">
                <label>
                    New Password<span class="req">*</span>
                </label>
                <input type="password" autocomplete="off" name="new_password" id="new_password"/>
            </div>
            <div class="field-wrap">
                <label>
                    Confirm New Password<span class="req">*</span>
                </label>
                <input type="password" autocomplete="off" name="confirm_new_password" id="confirm_new_password"/>
            </div>
            <div class="field-wrap">
                <label>
                    Current Password<span class="req">*</span>
                </label>
                <input type="password" autocomplete="off" name="current_password" id="current_password"/>
            </div>
            <span id="change_message"></span>
            <button class="button button-block" name="change" id="change"/>Change Password</button>
        </form>
    </div>    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>