<?php
require 'init.php';

$name_validate = '';
$name_value = '';
$err_name = '';
$email_validate = '';
$email_value = '';
$err_mail = '';
$pass_validate = '';
$err_pass = '';
$mach_pass = '';


$name_ok = false;
$email_ok = false;

if (isset($_POST['btn']) && $_POST['btn'] == "1") {
  if (isset($_POST['name']) && $_POST['name'] != "") {
    $name = $mysqli->escape_string($_POST['name']);
    $result = $mysqli->query("SELECT * FROM user WHERE name='$name'");
    if ($result->num_rows > 0) {
      $_SESSION['warning_message'] = 'Već postoji korisnik sa imenom <strong> ' . $name . '.</strong><br> To možete kasnije promeniti u profilu...';
    }
    if (strlen($name) > 2) {
      $name_validate = ' is-valid';
      $name_value = ' value="' . $name . '"';
      $name_ok = true;
    } else {
      $name_validate = ' is-invalid';
      $name_value = 'value="' . $name . '"';
      $err_name = '<div class="invalid-feedback">Ime mora biti više od 2 karaktera</div>';
    }
  }

  if (isset($_POST['email']) && $_POST['email'] != "") {
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM user WHERE email='$email'");
    if ($result->num_rows > 0) {
      $err_mail = '<div class="invalid-feedback">
          E-mail <u><strong>' . $email . '</strong></u> je već registrovan.
          </div>';
      $email_validate = ' is-invalid';
      $email_value = ' value="' . $email . '"';
    } elseif ($result->num_rows == 0) {
      $err_mail = '<div class="valid-feedback">
          Email ' . $email . ' je slobodan.
          </div>';
      $email_validate = ' is-valid';
      $email_value = ' value="' . $email . '"';
      $pass = $mysqli->escape_string($_POST['pass']);
      $email_ok = true;
    }
  }

  if ($email_ok == true && $name_ok == true) {
    $pass = $mysqli->escape_string($_POST['pass']);
    if (strlen($pass) < 2) {
      $err_pass = '<div class="invalid-feedback">
        ' . $mach_pass . ' Lozinka ima manje od 2 karaktera. 
        </div>';
      $pass_validate = ' is-invalid';
    } else {
      $reg_ip =  $_SERVER['REMOTE_ADDR'];
      $hash = $mysqli->escape_string(md5(rand(0, 1000)));

      $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));

      date_default_timezone_set('Europe/Belgrade');
      setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));

      $register_date = date('Y-m-d H:i:s');

      $sql = "INSERT INTO user (name, email, lozinka, hash, reg_date)"
        . "VALUES ('$name', '$email', '$pass', '$hash', '$register_date')";

      if ($mysqli->query($sql)) {
        $_SESSION['success_message'] = "Uspešno ste se registrovali.";
        //include('mail_it.php');
        //mail_register($email, $name, $hash);
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
    header('Location: success.php');
      } else {
        $_SESSION['fail_message'] = "Problem sa registracijom!";
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
      <a href="">Registruj<b>SE</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Unesi podatke za registraciju</p>
        <form action="register.php" method="post">
          <div class="input-group mb-3">
            <input name="name" type="text" class="form-control <?php echo $name_validate; ?>" placeholder="Kako se zoveš?" <?php echo $name_value; ?> required autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div><?php echo $err_name; ?>
          </div>
          <div class="input-group mb-3">
            <input id="email" name="email" type="email" class="form-control <?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div><?php echo $err_mail; ?>
          </div>
          <div class="input-group mb-3">
            <input id="passfield" name="pass" type="password" class="form-control <?php echo $pass_validate; ?>" placeholder="Lozinka min 8 karatera" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-eye"></span>

              </div>
            </div>
            <div id="pass_valid"></div>
          </div>

          <div class="row">
            <div class="col-8"><a class="text-sm text-info" href="login.php" class="text-center">Već sam registrovan</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-sm btn-info btn-block">RegistrujSE</button>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">
            <div class="col-8"><a class="text-sm text-info" href="registers.php" class="text-center">Registruj<strong>SALON</strong></a>
            </div>
            <!-- /.col -->
            <div class="col-4">
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