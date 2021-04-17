<?php
include 'init.php';
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
                            <?php
                            if (isset($_SESSION['sucess_message']) && $_SESSION['sucess_message'] <> '') {
                            ?>
                                <div class="alert alert-success text-center" id="success-alert">
                                    <?php echo $_SESSION['sucess_message']; ?>
                                </div>
                            <?php
                                $_SESSION['sucess_message'] = '';
                            }
                            if (isset($_SESSION['fail_message']) && $_SESSION['fail_message'] <> '') {
                            ?>
                                <div class="alert alert-danger text-center" id="success-alert">
                                    <?php echo $_SESSION['fail_message']; ?>
                                </div>
                            <?php
                                $_SESSION['fail_message'] = '';
                            }
                            ?>

                            <small>
                                <table id="orders" class="table table-sm table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>Id</th>
                                            <th>Kupac/Tel./Adresa</th>
                                            <th>Naručeno/Primljeno</th>
                                            <th>Vreme pripreme</th>
                                            <th>Cena(+Isporuka)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $orders_result = get_orders();

                                        foreach ($orders_result as $order_result) {

                                            $order_status = $order_result["order_status"];
                                            $order_id = $order_result["id"];
                                            $name = $order_result["name"];
                                            $phone = $order_result["phone"];
                                            $address = $order_result["address"];
                                            $price = $order_result["price"];
                                            $delivery_price = $order_result["delivery_price"];
                                            $order_time = $order_result["order_time"];
                                            $ord_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $order_time);
                                            $since_ord = $ord_start_date->diff(new DateTime());
                                            $since_ord_min = $since_ord->d * 24 * 60;
                                            $since_ord_min += $since_ord->h * 60;
                                            $since_ord_min += $since_ord->i;

                                            $recive_time = $order_result["order_received"];
                                            if ($recive_time == null) {
                                                $recive_info = 'Nije pregledana!';
                                            } else {
                                                $rec_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $recive_time);
                                                $since_rec = $rec_start_date->diff(new DateTime());
                                                $since_rec_min = $since_rec->d * 24 * 60;
                                                $since_rec_min += $since_rec->h * 60;
                                                $since_rec_min += $since_rec->i;
                                                $recive_info = $recive_time . ' (pre ' . $since_rec_min . 'min)';
                                            }


                                            $time_to_deliver = $order_result["time_to_deliver"];
                                            if ($time_to_deliver == null) {
                                                $delivery_info = 'Nije pregledana!';
                                            } else {
                                                $time_to_finsh = (new DateTime($recive_time))->modify('+' . $time_to_deliver . ' minutes')->format("Y-m-d H:i:s");
                                                //$time_to_finsh->modify("+{$time_to_deliver} minutes");
                                                //$time_to_finsh = date('Y-m-d H:i:s', $time_to_finsh);


                                                $now_time = new DateTime();
                                                //$now_time = DateTime::createFromFormat('Y-m-d H:i:s', $now);
                                                $to_finish = $now_time->diff(new DateTime($time_to_finsh));
                                                $min_to_finish = $to_finish->d * 24 * 60;
                                                $min_to_finish += $to_finish->h * 60;
                                                $min_to_finish += $to_finish->i;

                                                $delivery_info = "Treba da bude gotova za <strong class='text-lg text-warning'>" . $min_to_finish . "</strong>
                                                <br> Narucena je ".$recive_time;
                                            }
                                            switch ($order_status) {
                                                case 0:
                                                    $status = '</small><strong><span class="alertPulse2-css">Nepregdana</span><br><span class="alertPulse2-css">( poslata pre ' . $since_ord_min . ' min )</span></strong><small>';
                                                    $status_style = ' class="table-dark"';

                                                    break;
                                                case 1:
                                                    $status = '</small><strong>U pripremi<br><span class="alertPulse-css">( ' . $min_to_finish . ' min )</span></strong><small>';
                                                    $status_style = ' class="table-primary"';

                                                    break;
                                                default:
                                                    echo "Your favorite color is neither red, blue, nor green!";
                                            }




                                            echo ' <tr style="text-align:center" class="clickable-tr"  href="ord_process.php?order_id=' . $order_id . '">
                                            <td>' . $order_id . '</td>
                                            <td>' . $name . '<br>
                                                ' . $phone . '<br>
                                                ' . $address . '</td>
                                            <td>' . $order_time . ' (pre ' . $since_ord_min . 'min) <br>
                                                ' . $recive_info . '</td>
                                            <td>' . $time_to_finsh . '<br>
                                                ( još ' . $min_to_finish . ' min)</td>
                                            <td>' . $price . ' din (+
                                                ' . $delivery_price . ' din)</td>

                                            <td style="width:200px;"' . $status_style . '>' . $status . '</td>
                                            </tr>';


                                            $order_time='';
                                            $since_ord_min='';
                                            $recive_info='';
                                            $time_to_finsh='';
                                            $min_to_finish='';
                                            $price='';
                                            $delivery_price='';
                                            $status_style ='';
                                            $status ='';
                                            



                                        }

                                        ?>

                                    </tbody>

                                </table>
                            </small>

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
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(200);
            });
        }, 1000);
    });
</script>

</html>