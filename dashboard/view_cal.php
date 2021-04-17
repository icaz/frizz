<?php
include 'init.php';
// protect_page();
// var_dump($_SESSION);
date_default_timezone_set('Europe/Belgrade');
setlocale(LC_TIME, array('sr_CS.UTF-8', 'sr.UTF-8'));
setlocale(LC_ALL, 'sr_RS@latin');
include 'head.php';
if (isset($_GET['datum']) && $_GET['datum'] <> "") {
    $datum1 = $_GET['datum'];
    $danas1 = date_create($datum1);
    date_add($danas1, date_interval_create_from_date_string("-1 days"));
    $juce1 = date_format($danas1, "Y-m-d");
    $juce = strftime("%A, %d. %B %Y.", strtotime($juce1));

    $danas1 = date_create($datum1);
    date_add($danas1, date_interval_create_from_date_string("+1 days"));
    $sutra1 = date_format($danas1, "Y-m-d");
    $sutra = strftime("%A, %d. %B %Y.", strtotime($sutra1));

    $danas1 = date_create($datum1);
    $danas1 = date_format($danas1, "Y-m-d");
    $danas = strftime("%A, %d. %B %Y.", strtotime($danas1));
} else {
    $danas1 = date("Y-m-d");
    $danas = strftime("%A, %d. %B %Y.");
    $juce1 = date("Y-m-d", strtotime("-1 day"));
    $sutra1 = date("Y-m-d", strtotime("+1 day"));
    $juce = strftime("%A, %d. %B %Y.", strtotime($juce1));
    $sutra = strftime("%A, %d. %B %Y.", strtotime($sutra1));
}

$h = array();
$desc = array();


$keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
foreach ($keys as $key) {
    $h[$key] = 0;
    $h['09:30'] = 3;
    $status['09:30'] = 1;
    $h['13:00'] = 4;
    $status['13:00'] = 2;
    $h['17:30'] = 3;
    $status['17:30'] = 1;
    $desc[$key] = 'alo-' . $key;
}


?>

<body class="hold-transition sidebar-mini">




    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Label"><?php echo $danas; ?> u <span id="test"></span></h5>
                    <button name="body" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="reserve.php" method="POST">
                        <div class="form-group form-group-sm">
                            <textarea name="body" class="form-control" id="message-text" placeholder="Usluga"></textarea>
                            <input type="hidden" name="product_id" value="1">
                            <input id="uname" type="hidden" name="product_id" value="Nevena">

                        </div>


                        <div class="form-group form-group-sm">
                            <input name="author" type="text" class="form-control input-sm" id="comment-name" placeholder="Upit">
                        </div>
                        <div class="form-group form-group-sm">
                            <?php $a = rand(0, 10);
                            $b = rand(0, 10);
                            $c = $a + $b ?>
                            <input type="hidden" name="rnd_zbir" value="<?php echo $c; ?>">
                            <div class="input-group justify-content-center">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="zbir"><?php echo 'Koliko je: ' . $a . ' + ' . $b; ?></span>
                                </div>
                                <input id="zbir" name="zbir" type="number" size="3" class="form-control input-sm col-3" required>
                            </div>
                        </div>

                </div>

                <div class="modal-footer">



                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="submit" class="btn btn-primary">Zakaži</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
                            <button class="btn btn-primary btn-lg"> <?php
                                                                    echo $danas;
                                                                    ?>
                            </button>
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
            <div class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-tools p-0">
                            <a href="view_cal.php?datum=<?php echo $juce1; ?>">
                                <h6 class="float-left pt-0 btn btn-outline-primary btn-xs">
                                    <?php
                                    echo $juce;
                                    ?>
                                </h6>
                            </a>
                            <a href="view_cal.php?datum=<?php echo $sutra1; ?>">
                                <h6 class="float-right pt-0 btn btn-outline-primary btn-xs">
                                    <?php
                                    echo $sutra;
                                    ?>
                                </h6>
                            </a>
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
                                        $busy = 0;
                                        $tdesc = '';
                                        $style=' class="table-success" ';
                                        foreach ($keys as $key) {
                                            if ($h[$key] > 0) {
                                                if ($status[$key]==1) {
                                                    $style=' class="table-danger" ';
                                                } if ($status[$key]==2) {
                                                    $style=' class="table-warning" ';
                                                } 
                                                echo '<tr '.$style.'>';
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


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#commentModal">
                                Zakaži
                            </button>


                        </div>
                    </div><!-- /.row -->
                    <?php
                    $output_now = '';


                    // Now

                    $boja = 'primary';
                    $date = date(strtotime("-0 months"));
                    $day = date('d', $date);
                    $month = date('m', $date);
                    $year = date('Y', $date);
                    //Here we generate the first day of the month 
                    $first_day = mktime(0, 0, 0, $month, 1, $year);
                    //This gets us the month name 
                    //$title = date('F', $first_day) ;
                    switch ($month) {
                        case "01":
                            $mesec = 'Januar';
                            break;
                        case "02":
                            $mesec = 'Februar';
                            break;
                        case "03":
                            $mesec = 'Mart';
                            break;
                        case "04":
                            $mesec = 'April';
                            break;
                        case "05":
                            $mesec = 'Maj';
                            break;
                        case "06":
                            $mesec = 'Juni';
                            break;
                        case "07":
                            $mesec = 'Juli';
                            break;
                        case "08":
                            $mesec = 'Avgust';
                            break;
                        case "09":
                            $mesec = 'Septembar';
                            break;
                        case "10":
                            $mesec = 'Oktobar';
                            break;
                        case "11":
                            $mesec = 'Novembar';
                            break;
                        case "12":
                            $mesec = 'Decembar';
                            break;
                    }
                    //Here we find out what day of the week the first day of the month falls on 
                    $day_of_week = date('D', $first_day);
                    //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
                    switch ($day_of_week) {
                        case "Mon":
                            $blank = 0;
                            break;
                        case "Tue":
                            $blank = 1;
                            break;
                        case "Wed":
                            $blank = 2;
                            break;
                        case "Thu":
                            $blank = 3;
                            break;
                        case "Fri":
                            $blank = 4;
                            break;
                        case "Sat":
                            $blank = 5;
                            break;
                        case "Sun":
                            $blank = 6;
                            break;
                    }
                    //We then determine how many days are in the current month
                    $days_in_month = cal_days_in_month(0, $month, $year);
                    //Here we start building the table heads 

                    $output_now .= '<h4 align="center">' . $mesec . ' &nbsp;&nbsp;&nbsp;' . $year . '</h4>';
                    $output_now .= '<table align="center" cellspacing="1" cellpadding="1">
 <tr class="table-primary" align="center">';
                    $output_now .= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr">';
                    $day_count = 1;
                    while ($blank > 0) {
                        $output_now .= '<td></td>';
                        $blank = $blank - 1;
                        $day_count++;
                    }
                    //count up the days, untill we've done all of them in the month
                    $day_num = 1;
                    while ($day_num <= $days_in_month) {
                        if ($day_num < 10) {
                            $day_num0 = '0' . $day_num;
                        } else {
                            $day_num0 = $day_num;
                        }
                        if ($day_num0 == $day) {
                            $boja = 'info';
                        } else {
                            $boja = 'primary';
                        }
                        $output_now .= '<td align="right" valign="top"><a href="dan.php?dan=' . $year . '-' . $month . '-' . $day_num0 . '" class="btn btn-' . $boja . '" role="button">' . $day_num0 . '</a></td>';
                        $day_num++;
                        $day_count++;
                        //Make sure we start a new row every week
                        if ($day_count > 7) {
                            $output_now .= '</tr><tr>';
                            $day_count = 1;
                        }
                    }
                    //Finaly we finish out the table with some blank details if needed
                    while ($day_count > 1 && $day_count <= 7) {
                        $output_now .= '<td> </td>';
                        $day_count++;
                    }

                    $output_now .= '</tr></table>';

                    echo $output_now;
                    ?>


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
        $('.clickable-td').on('click', function() {
            var myLink = $(this).attr('href');
            var id = $(this).data('id');
            var vreme = $(this).data('vreme');
            var name = $('#uname').val();
            $('#test').text(vreme);
            $('#message-text').val(id + vreme);
            $('#comment-name').val(name);
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