<?php


function cancel_order($order_id, $order_canceled)
{
    include ('db.php');

    $sql = "UPDATE orders SET order_finished = '".$order_canceled."', order_status = '3' WHERE id = '".$order_id."'";

    if ($mysqli->query($sql)) {
        return 1;
    } 
    else
    { 
        return 0;
    }    

}

function finish_order($order_id, $order_finished)
{
    include ('db.php');

    $sql = "UPDATE orders SET order_finished = '".$order_finished."', order_status = '2' WHERE id = '".$order_id."'";

    if ($mysqli->query($sql)) {
        return 1;
    } 
    else
    { 
        return 0;
    }    

}

function prepare_order($order_id, $order_received, $ttl)
{
    include ('db.php');
    $sql = "UPDATE orders SET order_received = '".$order_received."', time_to_deliver = '".$ttl."', order_status = '1' WHERE id = '".$order_id."'";

    if ($mysqli->query($sql)) {
        return 1;
    } 
    else
    { 
        return 0;
    }    

}

function store_order ($name, $phone, $address, $price, $delivery_price, $email, $order_time) {
    include ('db.php');
    include ('item_func.php');
    
    $sql = "INSERT INTO orders (name, phone, address, price, delivery_price, email, order_time)" 
    ."VALUES ('$name', '$phone', '$address', '$price', '$delivery_price', '$email', '$order_time')";

    if ($mysqli->query($sql))
    {
        $last_id = $mysqli->insert_id;
        $_SESSION['sucess_message']='Uspešno ste naručili! -> order No. ->'.$last_id;
        // mail_order($last_id);
        return $last_id;
    } 
    else
    { 
        return 0;
    }
}

function store_order_detail ($order_id) {
    include('db.php');
    $store_result = '

    <table>
    <tr style="border: 1px solid white;" >
        <th></th>
        <th>Naziv</th>
        <th>Cena</th>
        <th>Količina</th>
        <th>Ukupno</th>
    </tr>
    ';
    $store_counter = 0;
    $total_order = 0;
    $cart_count = count($_SESSION['cart']);
    if ($cart_count > 0) {
        $cart_array = array_keys($_SESSION['cart']);
    } else {
        unset($cart_array);
    }
    if (isset($cart_array)) {
        foreach ($cart_array as $cart_item_id) {
            $cart_item_detail = get_item_detail($cart_item_id);
            $item_name = $cart_item_detail['name'];
            $category_name = $cart_item_detail['category_name'];
            $qty = $_SESSION['cart'][$cart_item_id];

            $price = $cart_item_detail['price'];

            $sql = "INSERT INTO order_detail (order_id, item_name, category_name, qty, price)"
            ."VALUES ('$order_id', '$item_name', '$category_name', '$qty', '$price')";

            if ($mysqli->query($sql)) {
                $store_counter++;
                $store_result .= '<tr><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px;">'. $store_counter.'.</td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px;">'. $item_name . '</td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px;">'.$price.' din</td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px;text-align: center; ">'.$qty.'</td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px; text-align: right;">'.$qty*$price.'.00 din</td></tr>';
                $total_order += $qty*$price;
            } else {
                $store_counter++;
                $store_result .= $store_counter.'. '. $item_name . ' NOT - oredered.<br>';
            }
        }
    } else {
        $store_result = 'Something wenty wrong! cart is unset...';
    }

    $store_result .= '<tr><td style="text-align: right;" colspan="4">Svega: </td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px; text-align: right;">'.$total_order.'.00 din</td></tr>';
    if ($total_order <= 800) {
        $store_result .= '<tr><td style="text-align: right;" colspan="4">Cena dostave: </td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px; text-align: right;">200.00 din</td></tr>';
        $total_order += 200;
    } else {
        $store_result .= '<tr><td style="text-align: right;" style="text-align: right;" colspan="4">Cena dostave: </td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px; text-align: right;">0.00 din</td></tr>';
    }
    $store_result .= '<tr><td style="text-align: right;" colspan="4"><strong>Svega: </strong></td><td style="border: 1px solid white; padding-left: 10px; padding-right: 10px; text-align: right;"><strong>'.$total_order.'.00 din</strong></td></tr></table>';
    return $store_result;
}