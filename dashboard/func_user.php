<?php

if (!function_exists('get_user_name')) {
    function get_user_name($email)
    {
        include ('db.php');
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $user_name = $user[0]["name"];
        return $user_name;
    }
}

if (!function_exists('get_user_role')) {
    function get_user_role($email)
    {
        include ('db.php');
        $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
        $user = $result->fetch_all(MYSQLI_ASSOC);
        $user_role_id = $user[0]["role"];

        $user_role_id_result = $mysqli->query("SELECT * FROM user_role WHERE id='$user_role_id'");
        $user_roles = $user_role_id_result->fetch_all(MYSQLI_ASSOC);
        $user_role = $user_roles[0]["role_name"];

        return $user_role;
    }
}



?>