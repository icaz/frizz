<?php
include 'init.php';
// protect_page();
// var_dump($_SESSION);
if (isset($_SESSION['logged_in'])){
        
    if ($_SESSION['email']=='') {
        $sent_from.= "NoName";
    } else { $sent_from=$_SESSION['name']."(".$_SESSION['email'].")"; }
}


include 'head.php';
?>

<body class="hold-transition sidebar-mini">






    <div class="wrapper">

        <?php
        include 'navbar.php';
        ?>


        <?php
        include 'sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Preporuči</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 offset-md-4">
                            <form action="invite_it.php" method="post">
                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="img/e-mail-whatsapp.png" alt="User profile picture">
                                        </div>
                                        <br>
                                        <input name="e_invite" class="form-control form-control-sm" type="email" placeholder="E-mail" required>
                                        <br>
                                        <textarea name="napomena" class="form-control form-control-sm" id="message-text" placeholder="Preporuka za app..."></textarea>
                                        <input type="hidden" name="user" value="<?php echo $sent_from;?>">
                                        <br>

                                        <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-primary btn-block">Preporuči</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <!-- /.row -->

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
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(200);
            });
        }, 1000);
    });
</script>


<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>



</html>