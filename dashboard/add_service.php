<?php
include 'init.php';
// protect_page();
// var_dump($_SESSION);
if (isset($_POST['submit']) && $_POST['submit'] != "") {
    include 'db.php';
    $service_name = $mysqli->escape_string($_POST['service_name']);
    $service_category_id = $mysqli->escape_string($_POST['service_category_id']);
    $units = $mysqli->escape_string($_POST['units']);
    $result = $mysqli->query("SELECT * FROM service WHERE name='$service_name' AND service_cat_id='$service_category_id'");

    if ($result->num_rows > 0) {
        $_SESSION['fail_message'] = 'Usluga ' . $service_name . ' već postoji u bazi.';
    } elseif ($result->num_rows == 0) {
        $sql = "INSERT INTO service (name, service_cat_id, units)"
            . "VALUES ('$service_name', '$service_category_id', '$units')";

        if ($mysqli->query($sql)) {
            $_SESSION['sucess_message'] = 'Usluga ' . $service_name . ' je dodata u bazu.';
        }
    }
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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Kategorije usluga</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                Frizerski salon - Katarina

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
            include 'info.php';
            ?>
            <!-- Main content -->
            <section class="content">

                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Nova usluga</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_service.php" method="POST">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="service_name">Naziv</label>
                                    <input type="text" class="form-control" name="service_name" id="service_name" placeholder="Naziv usluge" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="service_category_id">Kategorija</label>
                                    <select name="service_category_id" id="service_category_id" class="form-control custom-select" required>
                                        <option value="" selected disabled>Izaberi</option>
                                        <?php
                                        include 'db.php';
                                        $result = $mysqli->query("SELECT * FROM service_cat");
                                        $service_categories = $result->fetch_all(MYSQLI_ASSOC);
                                        foreach ($service_categories as $service_category) {
                                            echo "<option value='" . $service_category['id'] . "'>" . $service_category['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="time">Vreme</label>
                                    <select name="units" id="time" class="form-control custom-select" required>
                                        <option value="" selected disabled>Izaberi</option>
                                        <option value='1'>30 min</option>
                                        <option value='2'>60 min</option>
                                        <option value='3'>90 min</option>
                                        <option value='4'>120 min</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" value="1" name="submit" class="btn btn-success float-right">Dodaj</button>
                        </form>
                    </div>
                </div>
                <!-- /.card -->

                <!-- Default box -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Spisak kategorija usluga</h3>

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