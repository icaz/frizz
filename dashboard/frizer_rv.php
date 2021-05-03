<?php
include 'init.php';
// protect_page();
// var_dump($_SESSION);
if (logged_in() == false) {
    header('Location: login.php');
    exit();
}
$name = $_SESSION['name'];
$id = $_SESSION['id'];
if ($result = $mysqli->query("SELECT * FROM salon_admin WHERE id='$id'")) {
    if ($result->num_rows == 1) {
        header('Location: salon_profile.php?frizer_id=' . $id . '');
    } elseif ($result->num_rows > 1) {
        header('Location: salon_select.php?frizer_id=' . $id . '');
    }
}
date_default_timezone_set('Europe/Belgrade');
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
setlocale(LC_ALL, 'sr_RS@latin');
include 'head.php';
if (isset($_GET['datum']) && $_GET['datum'] <> "") {
    $datum1 = $_GET['datum'];
    $danas1 = date_create($datum1);
    date_add($danas1, date_interval_create_from_date_string("-1 days"));
    $juce1 = date_format($danas1, "Y-m-d");
    $juce = strftime("%d. %B", strtotime($juce1));

    $danas1 = date_create($datum1);
    date_add($danas1, date_interval_create_from_date_string("+1 days"));
    $sutra1 = date_format($danas1, "Y-m-d");
    $sutra = strftime("%d. %B", strtotime($sutra1));

    $danas1 = date_create($datum1);
    $danas1 = date_format($danas1, "Y-m-d");
    $danas = strftime("%d. %B %Y.", strtotime($danas1));
} else {
    $danas1 = date("Y-m-d");
    $danas = strftime("%d. %B %Y.");
    $juce1 = date("Y-m-d", strtotime("-1 day"));
    $sutra1 = date("Y-m-d", strtotime("+1 day"));
    $juce = strftime("%d. %B", strtotime($juce1));
    $sutra = strftime("%d. %B", strtotime($sutra1));
}

?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block mr-1 mt-1">
                    <a href="/../index.php" class="btn btn-sm btn-outline-light">Nazad na <strong> frizeri.u.nisu.rs</strong></a>
            </ul>

            <ul class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-sm btn-outline-light">log<strong>OUT</strong></a>
            </ul>

        </nav><!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-dark-secondary elevation-4">
            <!-- Brand Logo -->
            <a href="/../index.php" class="brand-link text-center">
                <strong>frizeri</strong>
            </a>
            <!-- Sidebar -->
            <div class="sidebar sidebar-dark-primary">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/avatar4.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="profile.php" class="d-block active"><?php echo $name; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>Salon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_cal.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Kalendar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_services.php" class="nav-link">
                                <i class="nav-icon fas fa-cut"></i>
                                <p>Usluge</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Radnici</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-danger">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>E-mail lista</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="invite.php" class="nav-link text-danger">
                                <i class="nav-icon fas fa-phone"></i>
                                <p>Preporuči</p>
                            </a>
                        </li>
                    </ul>
                </nav><!-- /.sidebar-menu -->
            </div><!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Menadžer Salona -
                                <?php
                                echo $name;
                                ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                Frizerski salon - <strong><i>Novi Salon</i></strong>

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">


                        <!-- widget-user1 -->

                        <div class="col-md-4">

                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-secondary">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="img/avatar3.jpg" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">Jelena Perić</h3>
                                    <h6 class="badge badge-danger float-right">1</h6>

                                </div>
                                <div class="card-body btn-group p-1">

                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-left"></i><br><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-outline-secondary "><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-right"></i><br><?php echo $sutra; ?> </a>

                                </div>
                                <div class="card-footer p-0">

                                    <small>
                                        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="40px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $h = array();
                                                $desc = array();


                                                $keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
                                                foreach ($keys as $key) {
                                                    $h[$key] = 0;
                                                    $h['09:30'] = 2;
                                                    $status['09:30'] = 1;
                                                    $h['13:00'] = 4;
                                                    $status['13:00'] = 2;
                                                    $h['17:30'] = 3;
                                                    $status['17:30'] = 1;
                                                    $desc[$key] = 'alo1-' . $key;
                                                }


                                                $busy = 0;
                                                $tdesc = '';
                                                $style = ' class="table-success" ';
                                                foreach ($keys as $key) {
                                                    if ($h[$key] > 0) {
                                                        if ($status[$key] == 1) {
                                                            $style = ' class="table-danger" ';
                                                        }
                                                        if ($status[$key] == 2) {
                                                            $style = ' class="table-warning" ';
                                                        }
                                                        echo '<tr ' . $style . '>';
                                                        echo '<td>' . $key . '</td>';
                                                        echo '<td rowspan="' . $h[$key] . '">' . $desc[$key] . '</td></tr>';
                                                        $busy = $h[$key];
                                                    } else {
                                                        echo '<tr>';
                                                        echo '<td class="table-success">' . $key . '</td>';
                                                        if ($busy == 0) {
                                                            echo '<td class="clickable-td table-success" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '"></td>';
                                                        }
                                                        echo '</tr>';
                                                    }
                                                    if ($busy > 0) {
                                                        $busy = $busy - 1;
                                                    }
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                    </small>


                                </div>
                            </div>

                        </div> <!-- /.widget-user1 -->

                        <!-- widget-user2 -->

                        <div class="col-md-4">

                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-secondary">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="img/avatar4.jpg" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">Pera frizer</h3>
                                    <h6 class="widget-user-desc text-right">stolica 2</h6>
                                </div>
                                <div class="card-body btn-group p-1">

                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-left"></i><br><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-outline-secondary "><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-right"></i><br><?php echo $sutra; ?> </a>

                                </div>
                                <div class="card-footer p-0">

                                    <small>
                                        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="40px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $h = array();
                                                $desc = array();


                                                $keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
                                                foreach ($keys as $key) {
                                                    $h[$key] = 0;
                                                    $h['11:00'] = 9;
                                                    $status['11:00'] = 1;
                                                    $h['16:30'] = 2;
                                                    $status['16:30'] = 2;
                                                    $desc[$key] = 'alo1-' . $key;
                                                }


                                                $busy = 0;
                                                $tdesc = '';
                                                $style = ' class="table-success" ';
                                                foreach ($keys as $key) {
                                                    if ($h[$key] > 0) {
                                                        if ($status[$key] == 1) {
                                                            $style = ' class="table-danger" ';
                                                        }
                                                        if ($status[$key] == 2) {
                                                            $style = ' class="table-warning" ';
                                                        }
                                                        echo '<tr ' . $style . '>';
                                                        echo '<td>' . $key . '</td>';
                                                        echo '<td rowspan="' . $h[$key] . '">' . $desc[$key] . '</td></tr>';
                                                        $busy = $h[$key];
                                                    } else {
                                                        echo '<tr>';
                                                        echo '<td class="table-success">' . $key . '</td>';
                                                        if ($busy == 0) {
                                                            echo '<td class="clickable-td table-success" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '"></td>';
                                                        }
                                                        echo '</tr>';
                                                    }
                                                    if ($busy > 0) {
                                                        $busy = $busy - 1;
                                                    }
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                    </small>


                                </div>
                            </div>

                        </div> <!-- /.widget-user2 -->

                        <!-- widget-user3 -->

                        <div class="col-md-4">

                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-secondary">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="img/avatar.png" alt="User Avatar">
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <h3 class="widget-user-username">I Gazda frizer</h3>
                                    <h6 class="badge badge-danger float-right">radnik 3</h6>

                                </div>
                                <div class="card-body btn-group p-1">

                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-left"></i><br><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-outline-secondary "><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-secondary btn-xs"><i class="fas fa-arrow-right"></i><br><?php echo $sutra; ?> </a>

                                </div>
                                <div class="card-footer p-0">

                                   
                                        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="40px"></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                $h = array();
                                                $desc = array();


                                                $keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
                                                foreach ($keys as $key) {
                                                    $h[$key] = 0;
                                                    $h['09:00'] = 5;
                                                    $status['09:00'] = 2;
                                                    $h['12:00'] = 6;
                                                    $status['12:00'] = 2;
                                                    $h['18:30'] = 4;
                                                    $status['18:30'] = 1;
                                                    $desc[$key] = 'alo1-' . $key;
                                                }


                                                $busy = 0;
                                                $tdesc = '';
                                                $style = ' class="table-success" ';
                                                foreach ($keys as $key) {
                                                    if ($h[$key] > 0) {
                                                        if ($status[$key] == 1) {
                                                            $style = ' class="table-danger" ';
                                                        }
                                                        if ($status[$key] == 2) {
                                                            $style = ' class="table-warning" ';
                                                        }
                                                        echo '<tr ' . $style . '>';
                                                        echo '<td>' . $key . '</td>';
                                                        echo '<td rowspan="' . $h[$key] . '">' . $desc[$key] . '</td></tr>';
                                                        $busy = $h[$key];
                                                    } else {
                                                        echo '<tr>';
                                                        echo '<td class="table-success">' . $key . '</td>';
                                                        if ($busy == 0) {
                                                            echo '<td class="clickable-td table-success" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '"></td>';
                                                        }
                                                        echo '</tr>';
                                                    }
                                                    if ($busy > 0) {
                                                        $busy = $busy - 1;
                                                    }
                                                }
                                                ?>

                                            </tbody>

                                        </table>


                                </div>
                            </div>

                        </div> <!-- /.widget-user3 -->


                        



                    </div>
            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
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

    <script>
        $('.clickable-tr').on('click', function() {
            var myLink = $(this).attr('href');
            window.location.href = myLink;
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
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