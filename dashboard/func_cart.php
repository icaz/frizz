<?php
//  ********************** CART ITEMS TABLE **************************************

if (isset($cart_array)) {
    foreach ($cart_array as $cart_item_id) {
        $cart_item_detail = get_item_detail($cart_item_id);
?>
        <tr class="table-row">

            <td class="column-1">
                <a href="cart_action.php?remove=<?php echo $cart_item_id; ?>">
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                        <img src="<?php echo $cart_item_detail['img']; ?>" alt="IMG-PRODUCT">
                    </div>
                </a>
            </td>

            <td class="column-2"><?php echo $cart_item_detail['name']; ?></td>
            <td class="column-3"><?php echo $cart_item_detail['price']; ?> din</td>
            <td class="column-4 t-right">
                <div class="flex-w bo5 of-hidden w-size17">
                    <a href="cart_action.php?subtract=<?php echo $cart_item_id; ?>">
                        <button class="color1 flex-c-m size7 bg8 eff2">
                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                        </button></a>

                    <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?php echo $_SESSION['cart'][$cart_item_id]; ?>">

                    <a href="cart_action.php?add=<?php echo $cart_item_id; ?>">
                        <button class="color1 flex-c-m size7 bg8 eff2">
                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                        </button></a>
                </div>
            </td>
            <td class="column-5 t-right"><?php echo $sub_total = ($_SESSION['cart'][$cart_item_id]) * $cart_item_detail['price']; ?> din</td>

    <?php
        $sub_total = ($_SESSION['cart'][$cart_item_id]) * $cart_item_detail['price'];
        $total = $total + $sub_total;
    }

    echo '</tr>';
}




    ?>