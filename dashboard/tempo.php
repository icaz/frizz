<?php
$h = array();
$desc = array();


$keys = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30'];
foreach ($keys as $key) {
    $h[$key] = 0;
    $h['09:30'] = 2;
    $h['13:00'] = 2;
    $h['17:30'] = 1;
    $desc[$key] = 'alo-' . $key;
}

// $array = array_combine($keys, $values);

// print_r($h);
// echo '<br>';
// print_r($desc);
?>
<table style="text-align:center" id="calendar" class="table table-condensed table-sm table-bordered table-hover" border=1>
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
        foreach ($keys as $key) {
            if ($h[$key] > 0) {
                echo '<tr class="clickable-tr" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '">';
                echo '<td>' . $key . '</td>';
                echo '<td rowspan="' . $h[$key] . '">' . $desc[$key] . '</td></tr>';
                $busy = $h[$key];
            } else {
                echo '<tr class="clickable-tr" href="#commentModal" data-toggle="modal" data-vreme="' . $key . '">';
                echo '<td>' . $key . '</td>';
                if ($busy == 0) {
                    echo '<td></td>';
                }
                echo '</tr>';
            }
            if ($busy>0) {$busy = $busy - 1;}
        }
        ?>