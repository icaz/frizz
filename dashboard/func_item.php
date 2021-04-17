<?php

if (!function_exists('get_cat_name')) {
    function get_cat_name($cat_id)
    {
        include ('db.php');
        $result_cats = $mysqli->query("SELECT * FROM category WHERE id='$cat_id'");
        $cats = $result_cats->fetch_all(MYSQLI_ASSOC);
        $cat_name = $cats[0]["name"];
        return $cat_name;
    }
}

if (!function_exists('get_item_detail')) {
    function get_item_detail($id)
    {
        clean($id);
        $item_details = array();
        include ('db.php');
        
        $menu_result = $mysqli->query("SELECT * FROM menu WHERE id='$id'");
        $menu_item = $menu_result->fetch_all(MYSQLI_ASSOC);
        $category_id = $menu_item[0]['category_id'];

        $category_result = $mysqli->query("SELECT * FROM category WHERE id='$category_id'");
        $category_name = $category_result->fetch_all(MYSQLI_ASSOC);
        $mysqli->close();

        $item_details['category_name'] = $category_name[0]['name'];
        $item_details['name'] = $menu_item[0]['name'];
        $item_details['detail'] = $menu_item[0]['detail'];
        $item_details['price'] = $menu_item[0]['price'];
        $item_details['img'] = $menu_item[0]['img'];
        return $item_details;
    }
}



?>