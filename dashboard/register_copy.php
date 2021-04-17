<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong>
    </div>

    <img width="20" height="20" src="img/loader.gif" alt="">
<?php
    require 'db.php';

    session_start();
    $reg_ip =  $_SERVER['REMOTE_ADDR'];
    $hash = $mysqli->escape_string(md5(rand(0,1000)));

    $name_validate='';
    $name_value='';
    $err_name='';
    $err_name2='';
    $email_validate='';
    $email_value='';
    $err_mail='';
    $pass_validate='';
    $err_pass='';
    $f=0;
    $name2='';
    if (isset($_POST['name']) && $_POST['name'] != "")
    {
        $name = $mysqli->escape_string($_POST['name']);
        if (strlen($name) > 3)
        {
          $name_validate=' is-valid';
          $name_value=' value="'.$name.'"';
        }
        else
        {
          $name_validate=' is-invalid';
          $name_value='value="'.$name.'"';
          $err_name='<div class="invalid-feedback">Ime mora biti više od 3 karaktera</div>';
        }
    
        if (isset($_POST['email']) && $_POST['email'] != "")
        {
            $email = $mysqli->escape_string($_POST['email']);
            $resulte = $mysqli->query("SELECT * FROM user WHERE email='$email'");
            if ($resulte->num_rows > 0)
            {
              $err_mail='<div class="invalid-feedback">
              Korisnik sa '.$email.' je već registrovan.
              </div>';
              $email_validate=' is-invalid';
              $email_value=' value="'.$email.'"';
            }
            elseif ($resulte->num_rows == 0)
            {
              $err_mail='<div class="valid-feedback">
              Email '.$email.' je slobodan.
              </div>';
              $email_validate=' is-valid';
              $email_value=' value="'.$email.'"';
            }
        
    $repass = $mysqli->escape_string($_POST['repass']);
    $pass = $mysqli->escape_string($_POST['pass']);


    if ($pass != $repass)
    {
      $err_pass='<div class="invalid-feedback">
      Lozinke se ne poklpaju.
      </div>';
      $pass_validate=' is-invalid';
    }
    elseif ($pass == $repass)
    {
      $err_pass='<div class="valid-feedback">OK!</div>';
      $pass_validate=' is-valid';
      $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));

      $sql = "INSERT INTO user (name, email, password, hash, reg_ip)" 
            ."VALUES ('$name','$email','$pass', '$hash', '$reg_ip')";

        if ($mysqli->query($sql))
        {
          $message="Na vašu e-mail adresu je poslat link sa linkom za aktivaciju naloga.";
        }
      
    }
  }
}
?>
<!DOCTYPE html>
<html  lang="rs">
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
    <script src="js/validation.js" type="text/javascript"></script>
    <script src="js/showpass.js" type="text/javascript"></script>
</head>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/dashboard/">Registruj<b>SE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Unesi podatke za registraciju</p>

      <form action="register.php" method="post">
        <div class="input-group mb-3">
          <input name="name" type="text"  class="form-control <?php echo $name_validate; ?>" placeholder="Kako se zoveš?" <?php echo $name_value; ?> required>
          <div class="input-group-append">
            <div id="emailcheck" class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div><?php echo $err_name;?>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" onblur="checkemail()" class="form-control<?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"><img width="20" height="20" src="img/loader.gif" alt=""></span>
            </div>
          </div>
          <?php echo $err_mail; ?>
        </div>
        <div class="input-group mb-3">
          <input name="pass" type="password" class="form-control<?php echo $pass_validate; ?>" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div><?php echo $err_pass; ?>
        </div>
        <div class="input-group mb-3">
          <input name="repass" type="password" class="form-control<?php echo $pass_validate; ?>" placeholder="Retype password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-sm btn-info btn-block">RegistrujSE</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <a class="text-sm text-info" href="login.php" class="text-center">Već sam registrovan</a>
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
          <?php echo $reg_ip; ?>

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
</body>
</html>