<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function dest_ses() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "session_destroy.php", true);
            xhttp.send();
        }                                       
    </script>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //protect_page();
    echo (isset($_SESSION) ? var_dump($_SESSION) : 'No session');


    ?>



    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>