<?php
require_once 'init.php';

//protect_page();
// var_dump($_SESSION);

// echo (isset($_SESSION) ? var_dump($_SESSION) : 'No session');
// echo '<br>';
// echo (isset($_COOKIE) ? var_dump($_COOKIE) : 'No _COOKIE');
protect_page();
if ($_SESSION['type'] == 'salon') {
  header('Location: profile.php');
}
include 'func_user.php';

include 'head.php';



?>

<body>

  <div class="container">


    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="logout.php" class="btn btn-sm btn-outline-primary">log<strong>OUT</strong></a>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="col-md-9">



            </div>
            <!-- /.col -->

            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-primary">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="img/avatar3.jpg" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">Jelena Perić</h3>
                <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-success float-right">Izmeni sliku</button>

              </div>
              <div class="card-body">
                <!-- <div class="row d-flex justify-content-center mb-0">
                <strong><i class="fas fa-map-marker-alt mr-1 mt-0"></i> Location</strong>

                </div> -->
                <!-- /.row -->
                <div class="row text-center">
                  <div class="form-group row d-flex justify-content-center">
                    <div class="col-sm-5 border-right border-left ">
                      <label for="adresa">Adresa</label>
                      <input class="form-control form-control-sm" id="adresa" type="text">
                    </div>
                    <div class="col-sm-3 border-right border-left">
                      <label for="grad">Grad</label>
                      <input class="form-control form-control-sm" id="grad" type="text">
                    </div>
                    <div class="col-sm-3 border-right border-left">
                      <label for="kraj">Kraj</label>
                      <input class="form-control form-control-sm" id="kraj" type="text">
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-primary btn-block"><b>Izmeni loaciju</b></a>
              </div>


              <!-- <div class="card-footer p-0">


                <a href="#" class="btn btn-primary btn-block"><b>Izmeni loaciju</b></a>

              </div> -->
            </div>

          </div>

          <div class="col-md-8">

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header p-2">
                Info
              </div>
              <div class="card-body">
                <div class="row mb-2 mt-0">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <strong><i class="fas fa-phone mr-1"></i> Telefon</strong>

                      <input data-toggle="tooltip" data-placement="top" title="Unesite telefon" class="form-control form-control-sm" type="text" placeholder="Unesite telefon" required>

                      <strong><i class="far fa-envelope mr-1"></i> E-mail</strong>

                      <input data-toggle="tooltip" data-placement="top" title="Unesite email" class="form-control form-control-sm" type="text" placeholder="Unesite email" required>


                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-8">
                    <div class="description-block">
                      <strong><i class="fas far fa-file-alt mr-1"></i> Nešto o meni...</strong>
                      <textarea class="form-control form-control-sm" rows="4" placeholder="Nešto o meni..."></textarea>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <!-- /.col -->
                </div>
                <!-- /.row -->



                <a href="#" class="btn btn-primary btn-block"><b>Sačuvaj izmene</b></a>



              </div>
              <!-- /.card-body -->

              <!-- /.row -->
            </div>

          </div>
        </div>


        <!-- /.row -->


        <!-- /.card -->
      </div>
      <!-- /.col -->




  </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->



  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
  </div>
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  <!-- Custom js -->

  <!-- DataTables -->
  <script src="admin/plugins/datatables/jquery.dataTables.js"></script>
  <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

  <!-- page script -->

  <script>
    $('.clickable-tr').on('click', function() {
      var myLink = $(this).attr('href');
      window.location.href = myLink;
    });
  </script>
</body>
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $("#malert").fadeTo(2000, 500).slideUp(500, function() {
        $("#malert").slideUp(200);
      });
    }, 1000);
  });
</script>

</html>