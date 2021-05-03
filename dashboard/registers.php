<?php
require 'init.php';

$name_value = '';
$email_value = '';
$email_ok = false;

if (isset($_POST['btn']) && $_POST['btn'] == "1") {

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $email = $mysqli->escape_string($_POST['email']);
      
        $result = $mysqli->query("SELECT * FROM frizer WHERE email='$email'");
        if ($result->num_rows > 0) {
            $_SESSION['fail_message'] = $email . ' je već registrovan kao Salon';
            $email_value = ' value="' . $email . '"';
            echo $email_ok = false;
        } elseif ($result->num_rows == 0) {
            $result2 = $mysqli->query("SELECT * FROM user WHERE email='$email'");
            if ($result2->num_rows > 0) {
                $_SESSION['fail_message'] = $email . ' je već registrovan kao korisnik';
                $email_value = ' value="' . $email . '"';
                $email_ok = false;
            } elseif ($result2->num_rows == 0) {
                $email_ok = true;
            }
          }
    }

    $pass = $mysqli->escape_string($_POST['pass']);
    $name = $mysqli->escape_string($_POST['name']);
    $name_value = ' value="' . $name . '"';
    if ($email_ok == true) {
        if (strlen($pass) < 2 ) {
            if (isset($_SESSION['fail_message'])){
                $_SESSION['fail_message'] .= '<br>Lozinka ima manje od 2 karaktera.';
            } else {
                $_SESSION['fail_message'] = '<br>Lozinka ima manje od 2 karaktera.';
            }
            
        } else {
            //$reg_ip =  $_SERVER['REMOTE_ADDR'];
            $hash = $mysqli->escape_string(md5(rand(0, 1000)));

            $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));

            date_default_timezone_set('Europe/Belgrade');
            setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));

            $register_date = date('Y-m-d H:i:s');

            $sql = "INSERT INTO frizer (name, email, lozinka, hash, reg_date)"
                . "VALUES ('$name', '$email', '$pass', '$hash', '$register_date')";

            if ($mysqli->query($sql)) {
                $_SESSION['success_message'] = 'Uspešno ste se registrovali!';
                //include('mail_it.php');
                //echo mail_register($email, $name, $hash);
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                header('Location: success.php');
            } else {
                $_SESSION['fail_message'] = $email . 'Problem sa registracijom';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="rs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registracija</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="">Registruj <strong>SALON</strong></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Unesi podatke za registraciju</p>

                <?php
                include 'info.php';
                ?>

                <form action="registers.php" method="post">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Menadžer Salona" <?php echo $name_value; ?> required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" name="email" type="email" class="form-control" placeholder="Email" <?php echo $email_value; ?> required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="passfield" name="pass" type="password" class="form-control" placeholder="Lozinka min 8 karatera" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye"></span>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8"><a class="text-sm text-info" href="login.php" class="text-center">Već sam registrovan</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-sm btn-info btn-block">Registruj <strong>SALON</strong></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <?php
                //echo $message; 
                ?>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>

    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#malert").fadeTo(2000, 500).slideUp(500, function() {
                    $("#malert").slideUp(200);
                });
            }, 1000);
        });
    </script>
</body>

</html>