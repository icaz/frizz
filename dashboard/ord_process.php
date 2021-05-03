<?php
include 'init.php';
include('general.php');
include 'order_func.php';
include 'item_func.php';

unset($order);
unset($order_details);

$order_details = array();
$order = array();
// protect_page();
// var_dump($_SESSION);
if (isset($_GET['order_id'])) {
    $order_id = clean($_GET['order_id']);
    $order = get_order($order_id);
    $order_details = get_order_detail($order_id);
} elseif (!isset($_GET['order_id'])) {
    header('Location: view_orders.php');
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
                            if (isset ($_SESSION['sucess_message']) && $_SESSION['sucess_message'] <> '') {
                            ?>
                                <div class="alert alert-success text-center" id="malert">
                                    <?php echo $_SESSION['sucess_message']; ?>
                                </div>
                            <?php
                                $_SESSION['sucess_message'] = '';
                            }
                            if (isset ($_SESSION['fail_message']) && $_SESSION['fail_message'] <> '') {
                            ?>
                                <div class="alert alert-danger text-center" id="malert">
                                    <?php echo $_SESSION['fail_message']; ?>
                                </div>
                            <?php
                                $_SESSION['fail_message'] = '';
                            }


                            $orders_result = get_orders();
                            ?>


                            <table style="text-align: center;" class="table table-dark table-sm">
                                <tr>
                                    <th>#</th>
                                    <th>Kupac/Tel./Adresa</th>
                                    <th>Naručeno</th>
                                    <th>Vreme pripreme</th>
                                    <th>Cena(+Isporuka)</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <form action="prepare_it.php" method="POST">
                                        <?php
                                        foreach ($order as $order_bit) {
                                        ?>
                                            <td><?php echo $order_bit['id'];  ?></td>
                                            <td><?php echo $order_bit['name'] . "<br>" . $order_bit['phone'] . "<br>" . $order_bit['address']; ?></td>
                                            <td><?php
                                                $phpdate = strtotime($order_bit['order_time']);
                                                $order_date = date('Y-m-d', $phpdate);
                                                $order_time = date('H:i:s', $phpdate);

                                                $ord_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $order_bit['order_time']);
                                                $since_ord = $ord_start_date->diff(new DateTime("now"));

                                                $since_ord_min = $since_ord->d * 24 * 60;
                                                $since_ord_min += $since_ord->h * 60;
                                                $since_ord_min += $since_ord->i;

                                                echo $order_date . "<br><strong class='text-lg text-warning'>" . $order_time . "</strong><br>(pre <strong class='text-lg text-warning'>" . $since_ord_min . "</strong> min)";  ?></td>
                                            <td>
                                                <div class="form-group text-center">

                                                    <?php
                                                    if ($order_bit['order_status'] == 0) {
                                                        $action_button = '<td><button type="submit" value="1" name="submit" class="btn btn-warning">Spremi</button></td>';
                                                    ?>
                                                        <select name="ttl" class="form-control text-center" required>
                                                            <option value="" disabled selected>____ min</option>
                                                            <option value="15 min">15 min</option>
                                                            <option value="30 min">30 min</option>
                                                            <option value="45 min">45 min</option>
                                                            <option value="60 min">60 min</option>
                                                            <option value="90 min">90 min</option>
                                                        </select>
                                                    <?php
                                                    } elseif ($order_bit['order_status'] == 1) {
                                                        $action_button = '<td><button type="submit" value="1" name="submit" class="btn btn-success">Spremno!</button></td>';

                                                        $recive_time = $order_bit["order_received"];
                                                        $rec_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $recive_time);
                                                        $since_rec = $rec_start_date->diff(new DateTime());
                                                        $since_rec_min = $since_rec->d * 24 * 60;
                                                        $since_rec_min += $since_rec->h * 60;
                                                        $since_rec_min += $since_rec->i;
                                                        $time_to_deliver = $order_bit["time_to_deliver"];
                                                        $time_to_finsh = (new DateTime())->modify('+' . $time_to_deliver . ' minutes')->format("H:i:s");
                                                        $now_time = new DateTime();
                                                        //$now_time = DateTime::createFromFormat('Y-m-d H:i:s', $now);
                                                        $to_finish = $now_time->diff(new DateTime($time_to_finsh));
                                                        $min_to_finish = $to_finish->d * 24 * 60;
                                                        $min_to_finish += $to_finish->h * 60;
                                                        $min_to_finish += $to_finish->i;

                                                        echo $time_to_deliver . " min<br><strong class='text-lg text-warning'>" . $time_to_finsh . "</strong><br>(još <strong class='text-lg text-warning'>" . $min_to_finish . "</strong> min)";
                                                    } elseif ($order_bit['order_status'] == 2) {
                                                        $action_button = '<td><button type="submit" value="1" name="submit" class="btn btn-default">Dostavi!</button></td>';
                                                    }
                                                    ?>

                                                </div>



                                            </td>
                                            <td><?php echo $order_bit['price'] . " din <br>(" . $order_bit['delivery_price'] . " din)"; ?></td>
                                            <input type="hidden" name="order_time" value="<?php echo $order_bit['order_time']; ?>">
                                            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

                                            <?php echo $action_button; ?>

                                        <?php
                                        }
                                        ?>
                                </tr>
                            </table>
                            </form>
                            <hr>
                            <table class="table table-sm table-dark table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th>Naziv</th>
                                        <th style="text-align: center;">Količina</th>
                                        <th style="text-align: center;">Cena</th>
                                        <th style="text-align: center;">Ukupno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $item_no = 1;
                                    $total = 0.00;
                                    foreach ($order_details as $order_detail) {

                                    ?>
                                        <tr>
                                            <th scope="row" style="text-align: center;"><?php echo $item_no; ?></th>
                                            <td><strong><?php echo $order_detail['item_name']; ?></strong> <small>(<?php echo $order_detail['category_name']; ?>)</small></td>
                                            <td style="text-align: center;"><?php echo $order_detail['qty']; ?></td>
                                            <td style="text-align: right;"><?php echo $order_detail['price'] . ' din'; ?></td>
                                            <td style="text-align: right;"><?php echo $sub_total = $order_detail['qty'] * $order_detail['price']; ?> din</td>
                                        </tr>

                                    <?php
                                        $item_no++;
                                        $total +=  $sub_total;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="4" style="text-align: right;"><strong>SVEGA UKUPNO:</strong></td>
                                        <td style="text-align: right;"><?php echo $total . ' din'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
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