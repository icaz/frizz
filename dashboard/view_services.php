<?php
include 'init.php';
// protect_page();
// var_dump($_SESSION);

include 'head.php';
$result = $mysqli->query("SELECT * FROM service_cat");
$service_categories = $result->fetch_all(MYSQLI_ASSOC);
foreach ($service_categories as $service_category) {
    $service_cat_id=$service_category['id'];
    $service_cat[$service_cat_id]=$service_category['name'];
}

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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Usluge</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                Frizerski salon - Katarina

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Spisak usluga</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Usluga</th>
                                    <th>Kategorija</th>
                                    <th style="width: 40px">Vreme</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                include 'db.php';
                                $result = $mysqli->query("SELECT * FROM service");
                                $services = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($services as $service) {
                                    $service_cat_id=$service['service_cat_id'];

                                    echo "<tr><td>" . $service['id'] . "</td><td>" . $service['name'] . "</td><td>".$service_cat[$service_cat_id]."</td>";

                                    switch ($service['units']) {
                                        case 1:
                                            echo "<td>30 min</td></tr>";
                                        break;
                                        case 2:
                                            echo "<td>60 min</td></tr>";
                                        break;
                                        case 3:
                                            echo "<td>90 min</td></tr>";
                                        break;
                                        case 4:
                                            echo "<td>120 min</td></tr>";
                                        break;

                                    }
                                }
                            ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <a href="add_service.php" class="btn btn-success float-right">Dodaj uslugu</a>
                    </div>

                </div>
                <!-- /.card -->

                <!-- Default box -->
                <div class="card card-info  collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Spisak kategorija usluga</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Kategorija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db.php';
                                $result = $mysqli->query("SELECT * FROM service_cat");
                                $service_categories = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($service_categories as $service_category) {
                                    echo "<tr><td>" . $service_category['id'] . "</td><td>" . $service_category['name'] . "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="add_service_category.php" class="btn btn-success float-right">Dodaj kategoriju usluge</a>
                    </div>

                </div>
                <!-- /.card -->


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    </div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- Custom js -->

    <!-- DataTables -->
    <script src="admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

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

<script>
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
</script>

</html>