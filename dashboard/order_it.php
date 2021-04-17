<?php
include('init.php');
$cart_count = count($_SESSION['cart']);
$store_status = '';
$store_status_detail = '';
$order2mail = '';

include('store_order.php');
include('mail_it.php');
if ($cart_count == 0) {
    $_SESSION['fail_message'] = 'Neuspešna narudžbina - korpa je prazna';
} elseif ($cart_count > 0)
{
    if ((isset($_POST['submit']) && $_POST['submit'] == "1"))
    {
        $name = $mysqli->escape_string($_POST['name']);
        $phone = $mysqli->escape_string($_POST['phone']);
        $address = $mysqli->escape_string($_POST['address']);
        if ((isset($_POST['email']) && $_POST['email'] != "")) {
            $email = $mysqli->escape_string($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = 'No valid email';
            }
        } else {
            $email = 'No valid email';
        }

        date_default_timezone_set('Europe/Belgrade');
        setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
        $order_time = date('Y-m-d H:i:s');
        $ordered = strftime("%A, %d %B %G", strtotime($order_time));
        $ordered_when = strftime("u %H:%M:%S", strtotime($order_time));

        $price = $mysqli->escape_string($_POST['price']);
        $delivery_price = $mysqli->escape_string($_POST['delivery_price']);

        $order_id = store_order($name, $phone, $address, $price, $delivery_price, $email, $order_time);
        if ($order_id == 0) {
            $store_status = 'Store order FAILED!';
        } else {
            $store_status = 'Store order SUCCESS! -> order_id ->' . $order_id . '<br>';
            $store_status_detail = store_order_detail($order_id);
        }

        if (mail_order($order_id, $ordered, $ordered_when, $name, $phone, $email, $address, $store_status_detail)=='OK')
        {
            $_SESSION['sucess_message'] ='Narudžbina sa sajta - br.'.$order_id. ' uspešno poslata';
            unset($_SESSION['cart']);
            $_SESSION['cart'] = array();
            $_SESSION['fail_message'] = 'Korpa je sada prazna.';
            header ('Location: ../cart.php');
            exit ();
        }
        else {
            $_SESSION['fail_message'] ='Problem sa narudžbinom - br.'.$order_id;
            header ('Location: ../cart.php');
            exit ();

        }


    }
}
?>
