<?php

if (!function_exists('cart_empty')) {
    function cart_empty()
    {
        $cart_count = count($_SESSION['cart']);
        if ($cart_count==0){ return true; { return false;}}
    }
}


if (!function_exists('get_orders')) {
    function get_orders()
    {
        $orders_result = array();
        include ('db.php');
        
        $orders = $mysqli->query("SELECT * FROM orders WHERE order_status<>'5'");
        $orders_result = $orders->fetch_all(MYSQLI_ASSOC);
        return $orders_result;
    }
}



if (!function_exists('get_order')) {
    function get_order($order_id)
    {
        include ('db.php');
        $order_id = $mysqli->escape_string($order_id);
        $order_result = $mysqli->query("SELECT * FROM orders WHERE id='$order_id'");
        if ($order_result->num_rows == 1) {
            $order = $order_result->fetch_all(MYSQLI_ASSOC);
            return $order;
        } else {
            $_SESSION['fail_message']='Problem with order none or more than one found!';
            return array(0 => 'Not existing order');
        }
    }
}

if (!function_exists('get_order_detail')) {
    function get_order_detail($order_id)
    {
        include ('db.php');
        $order_id = $mysqli->escape_string($order_id);
        $order_result_detail = $mysqli->query("SELECT * FROM order_detail WHERE order_id='$order_id'");
        if ($order_result_detail->num_rows >0) {
            $order_detail = $order_result_detail->fetch_all(MYSQLI_ASSOC);
            return $order_detail;
        } else {
            $_SESSION['fail_message']='Problem with order_details none were found!';
            return array(0 => 'Not existing order_details');
        }
    }
}




?>