<?php
    require 'db.php';

    session_start();

    $email = $_SESSION['email'];
    $email_value=' value="'.$email.'"';

?>
    

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Uspešno ste aktivirali nalog</title>

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

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/dashboard/">Uspešno ste aktivirali nalog</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" <?php echo $email_value; ?> required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          <div class="custom-control custom-switch custom-switch-on-info">
                      <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme">
                      <label class="custom-control-label" for="rememberme">Zapamti me</label>
                    </div>

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-sm btn-info btn-block">LogIN</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-1">
        <a class="text-sm text-info" href="forgot-password.php">Zaboravio sam lozinku</a>
      </p>
      <p class="mb-0">
        <a class="text-sm text-info" href="register.php" class="text-center">Registruj se</a>
      </p>



    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

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