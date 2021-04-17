<?php
include('init.php');

include('store_order.php');

if ((isset($_POST['submit']) && $_POST['submit'] == "1"))
    {
        date_default_timezone_set('Europe/Belgrade');
        setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));

        $order_finished = date('Y-m-d H:i:s');

        // $time_to_finsh = new DateTime($order_time);
        // $time_to_finsh->modify("+{$ttl} minutes")->format("Y-m-d H:i:s");


        $order_id = finish_order($order_id, $order_finished);
        if ($order_id == 0) {
            $store_status = 'Finish order FAILED!';
        } else {
            $store_status = 'Finish order SUCCESS!';
            header ('Location: view_orders.php');
            exit ();
        }


    }

?>
