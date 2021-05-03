<?php

if (!function_exists('get_user')) {
    function get_user($id)
    {
        include ('db.php');
        $result = $mysqli->query("SELECT * FROM user WHERE id='$id'");
        $user = $result->fetch_all();
        return $user;
    }
}

if (!function_exists('get_frizer')) {
    function get_frizer($id)
    {
        include ('db.php');
        $result = $mysqli->query("SELECT * FROM frizer WHERE id='$id'");
        $frizer = $result->fetch_all();
        return $frizer;
    }
}

if (!function_exists('get_user_role')) {
    function get_user_role($email)
    {
        include ('db.php');
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        $user = $result->fetch_all(MYSQLI_ASSOC);


        return $user_role;
    }
}



?>