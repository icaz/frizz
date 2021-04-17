<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include ('db.php');
// include ('general.php');

// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart']=array();
// }

