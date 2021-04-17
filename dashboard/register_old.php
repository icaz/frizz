<?php
    require 'db.php';

    session_start();
    $reg_ip =  $_SERVER['REMOTE_ADDR'];
    $hash = $mysqli->escape_string(md5(rand(0,1000)));

    $name_validate='';
    $name_value='';
    $err_name='';
    $email_validate='';
    $email_value='';
    $err_mail='';
    $pass_validate='';
    $err_pass='';
    $mach_pass='';

if (isset($_POST['btn']) && $_POST['btn']=="1")
{
    if (isset($_POST['name']) && $_POST['name'] != "")
    {
        $name = $mysqli->escape_string($_POST['name']);
        $result = $mysqli->query("SELECT * FROM user WHERE name='$name'");
        if ($result->num_rows > 0)
            {
              $_SESSION['name']='Već postoji korisnik sa imenom <strong> '.$name.'.</strong><br> To možete kasnije promeniti u profilu...';
            }
        if (strlen($name) > 3)
        {
          $name_validate=' is-valid';
          $name_value=' value="'.$name.'"';
          $pass = $mysqli->escape_string($_POST['pass']);
          //$repass = $mysqli->escape_string($_POST['repass']);

        }
        else
        {
          $name_validate=' is-invalid';
          $name_value='value="'.$name.'"';
          $err_name='<div class="invalid-feedback">Ime mora biti više od 3 karaktera</div>';
        }
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
              $pass = $mysqli->escape_string($_POST['pass']);
              //$repass = $mysqli->escape_string($_POST['repass']);
            }
    }

    /*
    if (isset($pass) && isset($repass))
    {
      $mach_pass='';
      if ($pass != $repass)
          {
            $mach_pass=' Lozinke se ne poklapaju.';
          }
      elseif ($pass == $repass)
      {
        if (strlen($pass) < 8)
        {
          $err_pass='<div class="invalid-feedback">
          '.$mach_pass.' Lozinka ima manje od 8 karaktera. 
          </div>';
          $pass_validate=' is-invalid';
        }
        elseif (strlen($pass) >= 8 && $mach_pass=='')
        {
          $err_pass='<div class="valid-feedback">OK!</div>';
          $pass_validate=' is-valid';
    
          $pass = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));
    
          $sql = "INSERT INTO  (name, email, password, hash, reg_ip)" 
                ."VALUES ('$name','$email','$pass', '$hash', '$reg_ip')";
    
            if ($mysqli->query($sql))
            {
              $_SESSION['message']='Uspešno ste se registrovali!';  
              header ('Location: success.php');;
            }
        }
      }
    } */
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
          <input name="name" type="text"  class="form-control <?php echo $name_validate; ?>" placeholder="Kako se zoveš?" <?php echo $name_value; ?> required autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div><?php echo $err_name;?>
        </div>
        <div class="input-group mb-3">
          <input id="email"  name="email" type="email" onkeyup="checkEmailNow()" onblur="checkemail()" class="form-control<?php echo $email_validate; ?>" placeholder="Email" <?php echo $email_value; ?> required  autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <span id="emailcheck"><?php echo $err_mail; ?></span>
        </div>
        <div class="input-group mb-3">
          <input id="passfield" name="pass" type="password"  class="form-control<?php echo $pass_validate; ?>" placeholder="Lozinka min 8 karatera"  autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
            <a id="pass" onclick="toggle_password('pass');" class="text-success">  
              <span class="fas fa-eye"></span></a>
            </div>
          </div><span id="passcheck"><?php echo $err_pass; ?></span>
        </div>

        <div class="row">
        <div class="col-8"><a class="text-sm text-info" href="login.php" class="text-center">Već sam registrovan</a>
</div>
          <!-- /.col -->
          <div class="col-4">
            <button name="btn" value="1" type="submit" class="btn btn-sm btn-info btn-block">RegistrujSE</button>
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

<script>
function ajaxObj (meth, url) {
    var x = new XMLHttpRequest();
    x.open(meth, url, true);
    x.setRequestHeader ('Content-type', 'application/x-www-form-urlencoded');
    return x;
  } 

  function ajaxReturn (x) {
    if(x.readyState == 4 && x.status == 200) {
      return true;
    }
  }
  
function toggle_password(target)
{
  var element = document.getElementById(target);
  var element2 = document.getElementById('passfield');


    if (element.classList.contains( "text-success" ))
    {
      if (element2.innerHTML == '')
      {
        element2.setAttribute('placeholder', 'Prvo ukucaj lozinku pa gledaj!');
      }
      element2.setAttribute('type', 'text');   
      element.classList.remove("text-success");
      element.classList.add("text-danger");
      element.innerHTML = '<span class="fas fa-lock"></span>';
    }
    else
    {
      if (element2.innerHTML == '')
      {
        element2.setAttribute('placeholder', 'Lozinka min 8 karatera');
      }

      element2.setAttribute('type', 'password');   
      element.classList.remove("text-danger");
      element.classList.add("text-success");
      element.innerHTML = '<span class="fas fa-eye"></span>';
    }
}
function checkEmailNow()
{
  var emailcheck = document.getElementById('emailcheck').value;
  var re = /^[a-zA-Z0-9\.\_]+\@@{1}[a-zA-Z0-9]+\.\w{2,4}$/;
    if(!re.test(emailcheck)) {
      $("#submit").prop("disabled",true);
      var emailcheck = document.getElementById('emailcheck');
                emailcheck.innerHTML = '<div class="invalid-feedback">Neispravan email...</div>';
                $("#submit").prop("disabled",true);
                var email = document.getElementById('email');
                if (email.classList.contains( "is-valid" ))
                {
                  email.classList.remove("is-valid");
                  email.classList.add("is-invalid");
                }
                else 
                {
                  email.classList.add("is-invalid"); 
                }

    }
    else {
      $("#submit").prop("disabled",false);
      var emailcheck = document.getElementById('emailcheck');
                emailcheck.innerHTML = '<div class="valid-feedback">OK</div>';
                var email = document.getElementById('email');
                if (email.classList.contains( "is-invalid" ))
                {
                  email.classList.remove("is-invalid");
                  email.classList.add("is-valid");
                }
                else 
                {
                  email.classList.add("is-valid");
                }

    }
    
}
function checkemail(){
	var emailcheck = document.getElementById('emailcheck').value;
	if(emailcheck != ""){
		var ajax = ajaxObj("POST", "check_email.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
              if (ajax.responseText='1') 
              {
                var emailcheck = document.getElementById('emailcheck');
                emailcheck.innerHTML = '<div class="invalid-feedback">Postoji nalog sa datim emailom...</div>';
                $("#submit").prop("disabled",true);
                var email = document.getElementById('email');
                if (email.classList.contains( "is-valid" ))
                {
                  email.classList.remove("is-valid");
                  email.classList.add("is-invalid");
                }
                else 
                {
                  email.classList.add("is-invalid"); 
                }
              }
              if (ajax.responseText='0') 
              {
                var emailcheck = document.getElementById('emailcheck');
                emailcheck.innerHTML = '<div class="valid-feedback">OK</div>';
                var email = document.getElementById('email');
                if (email.classList.contains( "is-invalid" ))
                {
                  email.classList.remove("is-invalid");
                  email.classList.add("is-valid");
                }
                else 
                {
                  email.classList.add("is-valid");
                }


              }
	        }
        }
        ajax.send("email="+emailcheck);
	}
}

</script>
</body>
</html>