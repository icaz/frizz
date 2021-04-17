<?php 
    require_once 'init.php';

    //protect_page();
    var_dump($_SESSION);

    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
    <img src="" alt="">
    <a href="/dashboard/">Profile<b>PAGE</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="#" method="post">
      <div class="input-group mb-3">
          <input name="name" type="text"  class="form-control is-valid" value="<?php echo $_SESSION['name']; ?>" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control is-valid" value="<?php echo $_SESSION['email']; ?>" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input name="cookie" type="text" class="form-control is-valid" 
          value="<?php 
          if (isset($_COOKIE['email']))
          {
            echo $_COOKIE['email'];
          } else { echo 'Not defined!'; }
         ?>" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


      </form>



      <p class="mb-1">
        <a class="text-sm" style="color:darkcyan;" href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a class="text-sm" style="color:darkcyan;" href="register.php" class="text-center">Register a new membership</a>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>

</html>
