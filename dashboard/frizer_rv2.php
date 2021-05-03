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
                        <img src="img/avatar.png" class="img-circle elevation-2" alt="User Image">
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

                        <div class="col-md-4">

                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                                <div class="btn-group">
                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-left"></i><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-outline-primary bg-white "><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-right"></i><?php echo $sutra; ?> </a>
                                </div>

                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-info">
                                    <h3 class="widget-user-username"> <?php echo $name; ?></h3>

                                </div>

                                <div class="widget-user-image">
                                    <img class="img-circle elevation-2" src="img/avatar.png" alt="User Avatar">
                                </div>

                                <div class="row">
                                    <div class="card-footer  p-1">
                                    </div>
                                </div>
                            </div>

                            <!-- /.widget-user -->
                            <div class="card card-primary">


                                <div class="card-body btn-group">

                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-left"></i><br><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-outline-primary "><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-right"></i><br><?php echo $sutra; ?> </a>

                                </div>
                                <div class="btn-group float-right">

                                    <a href="view_cal.php?datum=<?php echo $juce1; ?>" class="btn btn-primary btn-xs border-white"><i class="fas fa-arrow-left"></i><br><?php echo $juce; ?></a>
                                    <a href="" class="btn btn-primary border-white"><strong><?php echo $danas; ?></strong></a>
                                    <a href="view_cal.php?datum=<?php echo $sutra1; ?>" class="btn btn-primary btn-xs border-white"><i class="fas fa-arrow-right"></i><br><?php echo $sutra; ?> </a>

                                </div>

                                <div class="card-body pt-0">
                                    <small>
                                        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="40px"></th>
                                                    <th>Jelena</th>
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
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Radno Vreme</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div><small>
                                    <div class="card-body">
                                        <table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Pon</th>
                                                    <th>Uto</th>
                                                    <th>Sre</th>
                                                    <th>Čet</th>
                                                    <th>Pet</th>
                                                    <th>Sub</th>
                                                    <th>Ned</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>07:00 <input type="checkbox" name="pon07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="uto07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="sre07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="cet07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="pet07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="sub07" value="1"> </td>
                                                    <td>07:00 <input type="checkbox" name="ned07" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>08:00 <input type="checkbox" name="pon08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="uto08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="sre08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="cet08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="pet08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="sub08" value="1"> </td>
                                                    <td>08:00 <input type="checkbox" name="ned08" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>09:00 <input type="checkbox" name="pon09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="uto09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="sre09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="cet09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="pet09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="sub09" value="1" checked> </td>
                                                    <td>09:00 <input type="checkbox" name="ned09" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>10:00 <input type="checkbox" name="pon10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="uto10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="sre10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="cet10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="pet10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="sub10" value="1" checked> </td>
                                                    <td>10:00 <input type="checkbox" name="ned10" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>11:00 <input type="checkbox" name="pon11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="uto11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="sre11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="cet11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="pet11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="sub11" value="1" checked> </td>
                                                    <td>11:00 <input type="checkbox" name="ned11" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>12:00 <input type="checkbox" name="pon12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="uto12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="sre12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="cet12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="pet12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="sub12" value="1" checked> </td>
                                                    <td>12:00 <input type="checkbox" name="ned12" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>13:00 <input type="checkbox" name="pon13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="uto13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="sre13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="cet13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="pet13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="sub13" value="1" checked> </td>
                                                    <td>13:00 <input type="checkbox" name="ned13" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>14:00 <input type="checkbox" name="pon14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="uto14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="sre14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="cet14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="pet14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="sub14" value="1" checked> </td>
                                                    <td>14:00 <input type="checkbox" name="ned14" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>15:00 <input type="checkbox" name="pon15" value="1" checked> </td>
                                                    <td>15:00 <input type="checkbox" name="uto15" value="1" checked> </td>
                                                    <td>15:00 <input type="checkbox" name="sre15" value="1" checked> </td>
                                                    <td>15:00 <input type="checkbox" name="cet15" value="1" checked> </td>
                                                    <td>15:00 <input type="checkbox" name="pet15" value="1" checked> </td>
                                                    <td>15:00 <input type="checkbox" name="sub15" value="1"> </td>
                                                    <td>15:00 <input type="checkbox" name="ned15" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>16:00 <input type="checkbox" name="pon16" value="1" checked> </td>
                                                    <td>16:00 <input type="checkbox" name="uto16" value="1" checked> </td>
                                                    <td>16:00 <input type="checkbox" name="sre16" value="1" checked> </td>
                                                    <td>16:00 <input type="checkbox" name="cet16" value="1" checked> </td>
                                                    <td>16:00 <input type="checkbox" name="pet16" value="1" checked> </td>
                                                    <td>16:00 <input type="checkbox" name="sub16" value="1"> </td>
                                                    <td>16:00 <input type="checkbox" name="ned16" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>17:00 <input type="checkbox" name="pon17" value="1" checked> </td>
                                                    <td>17:00 <input type="checkbox" name="uto17" value="1" checked> </td>
                                                    <td>17:00 <input type="checkbox" name="sre17" value="1" checked> </td>
                                                    <td>17:00 <input type="checkbox" name="cet17" value="1" checked> </td>
                                                    <td>17:00 <input type="checkbox" name="pet17" value="1" checked> </td>
                                                    <td>17:00 <input type="checkbox" name="sub17" value="1"> </td>
                                                    <td>17:00 <input type="checkbox" name="ned17" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>18:00 <input type="checkbox" name="pon18" value="1" checked> </td>
                                                    <td>18:00 <input type="checkbox" name="uto18" value="1" checked> </td>
                                                    <td>18:00 <input type="checkbox" name="sre18" value="1" checked> </td>
                                                    <td>18:00 <input type="checkbox" name="cet18" value="1" checked> </td>
                                                    <td>18:00 <input type="checkbox" name="pet18" value="1" checked> </td>
                                                    <td>18:00 <input type="checkbox" name="sub18" value="1"> </td>
                                                    <td>18:00 <input type="checkbox" name="ned18" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>19:00 <input type="checkbox" name="pon19" value="1" checked> </td>
                                                    <td>19:00 <input type="checkbox" name="uto19" value="1" checked> </td>
                                                    <td>19:00 <input type="checkbox" name="sre19" value="1" checked> </td>
                                                    <td>19:00 <input type="checkbox" name="cet19" value="1" checked> </td>
                                                    <td>19:00 <input type="checkbox" name="pet19" value="1" checked> </td>
                                                    <td>19:00 <input type="checkbox" name="sub19" value="1"> </td>
                                                    <td>19:00 <input type="checkbox" name="ned19" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>20:00 <input type="checkbox" name="pon20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="uto20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="sre20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="cet20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="pet20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="sub20" value="1"> </td>
                                                    <td>20:00 <input type="checkbox" name="ned20" value="1"> </td>
                                                </tr>
                                                <tr>
                                                    <td>21:00 <input type="checkbox" name="pon21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="uto21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="sre21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="cet21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="pet21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="sub21" value="1"> </td>
                                                    <td>21:00 <input type="checkbox" name="ned21" value="1"> </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        <div class="card-footer">
                                            <button id="mySubmit" name="btn" value="1" type="submit" class="btn btn-success float-right">Sačuvaj</button>
                                        </div>
                                        </form>
                                    </div>
                                </small>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

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