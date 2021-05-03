<?php
include 'init.php';
$order_result=array();
// protect_page();
// var_dump($_SESSION);


?>


<!DOCTYPE html>

<html lang="rs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Kontrolna tabla</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Page specific style -->

    <!-- DataTables -->
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block mr-1 mt-1">
                    <a href="/../index.php" class="btn btn-sm btn-outline-dark">Nazad na cal.rs</a>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar  sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="./" class="brand-link">
                <img src="img/logo.png" alt="Logo" class="brand-image img-square elevation-3" style="opacity: .8"><br>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/avatar-icon-png.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kao Neki Lik</a>
        </div>
      </div>-->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard_narudzbine" class="nav-link active">
                                <i class="nav-icon fas fa-inbox"></i>
                                <p>Narudžbine</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mail_list.php" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>E-mail lista</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


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
                            <?php
                            if ($_SESSION['sucess_message'] <> '') {
                            ?>
                                <div class="alert alert-success text-center" id="malert">
                                    <?php echo $_SESSION['sucess_message']; ?>
                                </div>
                            <?php
                                $_SESSION['sucess_message'] = '';
                            }
                            if ($_SESSION['fail_message'] <> '') {
                            ?>
                                <div class="alert alert-danger text-center" id="malert">
                                    <?php echo $_SESSION['fail_message']; ?>
                                </div>
                            <?php
                                $_SESSION['fail_message'] = '';
                            }


                            $orders_result = get_orders();
                            ?>

                            <small>
                                <table id="orders" class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>Id</th>
                                            <th>Kupac/Tel./Adresa</th>
                                            <th>Naručeno/Primljeno</th>
                                            <th>Najavljeno</th>
                                            <th>Cena(+Isporuka)</th>
                                            <th>Gotovo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                        foreach ($orders_result as $order_result) {

                                            $order_id=$order_result["id"];
                                            $name=$order_result["name"];
                                            $phone=$order_result["phone"];
                                            $address=$order_result["address"];
                                            $price=$order_result["price"];
                                            $delivery_price=$order_result["delivery_price"];
                                            $order_time=$order_result["order_time"];
                                            $ord_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $order_time);
                                            $since_ord = $ord_start_date->diff(new DateTime());
                                            $since_ord_min = $since_ord->d * 24 * 60;
                                            $since_ord_min += $since_ord->h * 60;
                                            $since_ord_min += $since_ord->i;

                                            $recive_time=$order_result["order_received"];
                                            if ($recive_time==null) {
                                                $rec_start_date='00';
                                                $since_rec_min='00';
                                            } else {
                                                $rec_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $recive_time);
                                                $since_rec = $rec_start_date->diff(new DateTime());
                                                $since_rec_min = $since_rec->d * 24 * 60;
                                                $since_rec_min += $since_rec->h * 60;
                                                $since_rec_min += $since_rec->i;
                                            }

                                            
                                            $time_to_deliver=$order_result["time_to_deliver"];
                                            if ($time_to_deliver==0) {
                                                $time_to_deliver=30;
                                            }
                                            $time_to_finsh = (new DateTime())->modify('+'.$time_to_deliver.' minutes')->format("Y-m-d H:i:s");
                                            //$time_to_finsh->modify("+{$time_to_deliver} minutes");
                                            //$time_to_finsh = date('Y-m-d H:i:s', $time_to_finsh);


                                            $now_time=new DateTime();
                                            //$now_time = DateTime::createFromFormat('Y-m-d H:i:s', $now);
                                            $to_finish = $now_time->diff(new DateTime( $time_to_finsh));
                                            $min_to_finish = $to_finish->d * 24 * 60;
                                            $min_to_finish += $to_finish->h * 60;
                                            $min_to_finish += $to_finish->i;

                                            if ($order_result["order_finished"]==NULL) {
                                                $order_finished = '<span style="background-color: red; padding: 5px;" > NE </span>';
                                            } else { $order_finished = $order_result["order_finished"]; }
                                             
                                            
                                            



                                            echo ' <tr style="text-align:center" class="clickable-tr"  href="ord_process.php?order_id='.$order_id.'">
                                            <td>'.$order_id.'</td>
                                            <td>'.$name.'<br>
                                                '.$phone.'<br>
                                                '.$address.'</td>
                                            <td>'.$order_time.' (pre '.$since_ord_min.'min) <br>
                                                '.$recive_time.' (pre '.$since_rec_min.'min) </td>
                                            <td>'.$time_to_finsh.'<br>
                                                ( još '.$min_to_finish.' min)</td>
                                            <td>'.$price.' din (+
                                                '.$delivery_price.' din)</td>

                                            <td>'.$order_finished.'</td>
                                            </tr>';
                                            
                                    }

?>

                                    </tbody>

                                </table>
                            </small>
<?php
$start_date = new DateTime('2021-02-06 11:46:32');
$since_start = $start_date->diff(new DateTime());
echo $since_start->days.' days total<br>';
echo $since_start->y.' years<br>';
echo $since_start->m.' months<br>';
echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';

?>

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
                order: [[ 3, 'desc' ]]
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
$(document).ready(function () {
    setTimeout(function () { 
    $("#malert").fadeTo(2000, 500).slideUp(500, function() {
    $("#malert").slideUp(200);
  });
}, 1000);
});
</script>
</html>