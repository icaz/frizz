<?php
include 'init.php';
$order_result = array();
// protect_page();
// var_dump($_SESSION);



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
            <div class="content">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">

                        <div class="card-body">
                            OK!!!

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->

            </div><!-- /.container-fluid -->
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
        $(function() {
            $('#orders').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                order: [
                    [3, 'desc']
                ]
            });
        });
    </script>
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