<?php
ob_start();
session_start();
//require "users.php";


//require "general.php";
function db_connect()
{
    $link = NULL;
    global $link;
    $link = mysqli_connect("localhost", "duty", "root", "");
    mysqli_set_charset($link, "utf8");
    if (!$link) {
        echo "Error: Unable to connect to Stanca MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    return $link;
}

$datum1 = date("Y-m-d");
$juce = date("Y-m-d", strtotime("-1 day"));
$sutra = date("Y-m-d", strtotime("+1 day"));



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/templatemo-style.css" />
    <title>Sided Bootstrap 4 Theme</title>
</head>
<script src="js/jquery-3.3.1.min.js"></script>

    <style>
        canvas {
            border: 1px solid black;
            width: 100%;
            height: 1000px;
        }




        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        body {
            padding-top: 0px;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
        .clock {
            color: deepskyblue;
        }

        #Date {
            font-weight: bold;
            font-size: 1rem;
            display: inline;
        }

        #hours {
            font-size: 3.5rem;
            font-weight: bold;
            display: inline;
        }

        #min {
            font-size: 4.5rem;
            font-weight: bold;
            display: inline;
        }

        #sec {
            font-size: 5.5rem;
            font-weight: bold;
            display: inline;
        }

        #point {
            font-weight: bold;
            display: inline;
        }
    </style>
<body>

    <div class="columns-bg">

     <!-- Section 2 -->
      <section id="section_2" class="tm-section-4">
        <div class="container-fluid">
          <div class="row">
            <div
              class="col-md-12 col-lg-6 tm-section-image-container tm-img-left-container"
            >
              <img src="img/forty_image_22.jpg" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-12 col-lg-6 pl-lg-0">
              <div class="tm-section-text-container-3 tm-bg-gray h-100">
              
                              <div class="text-right"><h2 class="text-uppercase tm-text-primary tm-site-name">PROFIL</h2>
                <div class="clock">
                        <div id="hours"></div>
                        <div id="point">:</div>
                        <div id="min"></div>
                        <div id="point">:</div>
                        <div id="sec"></div>
                </div>

    <div id="Date"></div>
                <hr class="tm-hr-mb" />

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

      <!-- Section 1 -->
      <section id="section_1" class="tm-p-2-section-1 tm-sm-bg-blue">
        <div class="container-fluid">
          <div class="row flex-column-reverse flex-lg-row">
            <div class="col-md-12 col-lg-6 tm-text-left-container">
              <div class="tm-section-text-container-3 tm-bg-white-alpha h-100">
                <?php 
$output_now='';

// Now
$boja='danger';
$date = date(strtotime("-0 months"));
 $day = date('d', $date) ; 
 $month = date('m', $date); 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 //$title = date('F', $first_day) ;
 switch($month){ 
 case "01": $mesec = 'Januar'; break; 
 case "02": $mesec = 'Februar'; break; 
 case "03": $mesec = 'Mart'; break; 
 case "04": $mesec = 'April'; break; 
 case "05": $mesec = 'Maj'; break; 
 case "06": $mesec = 'Juni'; break; 
 case "07": $mesec = 'Juli'; break; 
 case "08": $mesec = 'Avgust'; break; 
 case "09": $mesec = 'Septembar'; break; 
 case "10": $mesec = 'Oktobar'; break; 
 case "11": $mesec = 'Novembar'; break; 
 case "12": $mesec = 'Decembar'; break; 
 }
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 
 $output_now.= '<strong class="btn btn-disabled btn-xs btn-block">'.$mesec.' - '. $year.'</strong>';
 $output_now.= '<table 
 class="btn btn-disabled btn-xs btn-block"
 width="100%" align="center"  border="0" cellspacing="0" cellpadding="0">
 <tr>';
 $output_now.= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr>';
 $day_count = 1;
 while ($blank > 0) 
 { 
 $output_now.= '<td></td>'; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //count up the days, untill we've done all of them in the month
 $day_num = 1;
 while ( $day_num <= $days_in_month ) 
 {
	 if ($day_num<10){ $day_num0='0'.$day_num; }
	 else { $day_num0=$day_num; }
	 if ($day_num0==$day) {$boja='info';}
	 else {$boja='default';}
 $output_now.= '<td><a href="dan.php?dan='.$year.'-'.$month.'-'.$day_num0.'" class="btn btn-'.$boja.' btn-xs btn-block" role="button">'.$day_num0.'</a></td>'; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 $output_now.= '</tr><tr>';
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 $output_now.= '<td> </td>'; 
 $day_count++; 
 } 
 
 $output_now.= '</tr></table>'; 

	echo $output_now;



?>                         
                </p>
              </div>
            </div>
            <div
              class="col-md-12 col-lg-6 tm-section-image-container tm-img-right-container"
            >
              <img
                src="img/forty_image_21.jpg"
                alt="Image"
                class="img-fluid tm-img-right"
              />
            </div>
          </div>
        </div>
      </section>  
      
           <!-- Section 1 -->
           <section id="section_1" class="tm-p-2-section-1 tm-sm-bg-blue">
        <div class="container-fluid">
          <div class="row flex-column-reverse flex-lg-row">
            <div class="col-md-12 col-lg-6 tm-text-left-container">
              <div class="tm-section-text-container-3 tm-bg-white-alpha h-100">
              <?php 
$output_now='';

// Now
$boja='danger';
$date = date(strtotime("-0 months"));
 $day = date('d', $date) ; 
 $month = date('m', $date); 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 //$title = date('F', $first_day) ;
 switch($month){ 
 case "01": $mesec = 'Januar'; break; 
 case "02": $mesec = 'Februar'; break; 
 case "03": $mesec = 'Mart'; break; 
 case "04": $mesec = 'April'; break; 
 case "05": $mesec = 'Maj'; break; 
 case "06": $mesec = 'Juni'; break; 
 case "07": $mesec = 'Juli'; break; 
 case "08": $mesec = 'Avgust'; break; 
 case "09": $mesec = 'Septembar'; break; 
 case "10": $mesec = 'Oktobar'; break; 
 case "11": $mesec = 'Novembar'; break; 
 case "12": $mesec = 'Decembar'; break; 
 }
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 
 $output_now.= '<strong class="btn btn-disabled btn-xs btn-block">'.$mesec.' - '. $year.'</strong>';
 $output_now.= '<table 
 class="btn btn-disabled btn-xs btn-block"
 width="100%" align="center"  border="0" cellspacing="0" cellpadding="0">
 <tr>';
 $output_now.= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr>';
 $day_count = 1;
 while ($blank > 0) 
 { 
 $output_now.= '<td></td>'; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //count up the days, untill we've done all of them in the month
 $day_num = 1;
 while ( $day_num <= $days_in_month ) 
 {
	 if ($day_num<10){ $day_num0='0'.$day_num; }
	 else { $day_num0=$day_num; }
	 if ($day_num0==$day) {$boja='info';}
	 else {$boja='default';}
 $output_now.= '<td><a href="dan.php?dan='.$year.'-'.$month.'-'.$day_num0.'" class="btn btn-'.$boja.' btn-xs btn-block" role="button">'.$day_num0.'</a></td>'; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 $output_now.= '</tr><tr>';
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 $output_now.= '<td> </td>'; 
 $day_count++; 
 } 
 
 $output_now.= '</tr></table>'; 

	echo $output_now;



?>                         

            </div>
            </div>
            <div
              class="col-md-12 col-lg-6 tm-section-image-container tm-img-right-container"
            >
              <img
                src="img/forty_image_21.jpg"
                alt="Image"
                class="img-fluid tm-img-right"
              />
            </div>
          </div>
        </div>
      </section>  
      
      
      <!-- Section 2 -->
      <section id="section_2" class="tm-section-4">
        <div class="container-fluid">
          <div class="row">
            <div
              class="col-md-12 col-lg-6 tm-section-image-container tm-img-left-container"
            >
              <img src="img/forty_image_22.jpg" alt="Image" class="img-fluid" />
            </div>
            <div class="col-md-12 col-lg-6 pl-lg-0">
              <div class="tm-section-text-container-3 tm-bg-gray h-100">
              <h1 class="text-uppercase tm-text-primary tm-site-name">
              <span style="font-size: 2.5rem;">Pro</span>
                  <span style="font-size: 1.5rem;">fi</span>
                  <span style="font-size: 3.5rem;">le</span></h1>


               
                <div class="tm-site-name-container">                  

<h1 class="text-uppercase tm-text-primary tm-site-name">
  <div class="tm-site-name-container-inner">
     
      

  <p class="tm-p-mb">
 <div class="clock">
          <div id="hours"></div>
          <div id="point">:</div>
          <div id="min"></div>
          <div id="point">:</div>
          <div id="sec"></div>
</div>
  </p>
      </div>


      <hr class="tm-hr-mb" />
    <div id="Date"></div>
  </div>
</div> 
</div>
              </div>
            </div>
          </div>
        </div>
      </section>

        <!-- Logo & Intro -->
        <section id="logo" class="tm-section-logo">
        <div class="container-fluid">
          <div class="row">                  


            <div class="col-sm-12 offset-sm-0 col-md-6 offset-md-6">
             <h1 class="text-uppercase tm-text-primary tm-site-name">
                  <span style="font-size: 6.5rem;">Profile</span>

                </h1> <div class="tm-site-name-container">                  

              <h1 class="text-uppercase tm-text-primary tm-site-name">
 
                 sdfsdfsd
                   <img src="img/his-profile.png" alt="Image" class="img-fluid tm-img-right" />
                    </div>

                  </p>
                  
                </div>
              </div> <div id="Date"></div>
            </div>
          </div>
        </div>
      </section>

        <!-- Fusce, Section 4 -->
        <section id="section_4" class="tm-section-4">
            <div class="container-fluid">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-md-12 col-lg-6 tm-text-left-container">
                        <div class="tm-section-text-container-3 tm-bg-white-alpha h-100">
                            <h2 class="tm-text-accent tm-section-title-mb">
                                Fusce a porttitor augue
                            </h2>
                            <div class="media mb-5">
                            <a href="#" class="tm-contact-link">
                                <span class="tm-contact-icon-container">
                                    <span class="tm-contact-icon-container-inner">
                                        <i class="fas fa-phone tm-contact-icon tm-phone-icon"></i>
                                    </span>
                                </span>
                                <span class="media-body"> 010-020-0340 </span>
                            </a>
                        </div>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 tm-section-image-container tm-img-right-container">
                    <div class="col-sm-2 sidenav text-center">


</div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Contact -->
        <section id="contact" class="tm-section-contact">
            <div class="row tm-contact-section">
                <div class="col-md-6 px-0">
                    <div class="tm-bg-white-alpha tm-contact-left">
                        <div class="media mb-5">
                            <a href="#" class="tm-contact-link">
                                <span class="tm-contact-icon-container">
                                    <span class="tm-contact-icon-container-inner">
                                        <i class="fas fa-phone tm-contact-icon tm-phone-icon"></i>
                                    </span>
                                </span>
                                <span class="media-body"> 010-020-0340 </span>
                            </a>
                        </div>
                        <div class="media mb-5">
                            <a href="mailto:" class="tm-contact-link">
                                <span class="tm-contact-icon-container">
                                    <span class="tm-contact-icon-container-inner">
                                        <i class="fas fa-envelope tm-contact-icon"></i>
                                    </span>
                                </span>
                                <span class="media-body"> info@company.com </span>
                            </a>
                        </div>
                        <div class="media">
                            <a href="" class="tm-contact-link">
                                <span class="tm-contact-icon-container">
                                    <span class="tm-contact-icon-container-inner">
                                        <i class="fas fa-map-marker-alt tm-contact-icon"></i>
                                    </span>
                                </span>
                                <span class="media-body">
                                    6120 Suspendisse ultricies<br />Scelerisque tellus, ID
                                    10260<br />Magna aliquet porttitor
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="tm-contact-form-container">
                    <?php 
$output_prev='';
$output_now='';
$output_next='';

// Prev
$date = date(strtotime("-1 months"));
 $day = date('d', $date) ; 
 $month = date('m', $date); 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 //$title = date('F', $first_day) ;
 switch($month){ 
 case "01": $mesec = 'Januar'; break; 
 case "02": $mesec = 'Februar'; break; 
 case "03": $mesec = 'Mart'; break; 
 case "04": $mesec = 'April'; break; 
 case "05": $mesec = 'Maj'; break; 
 case "06": $mesec = 'Juni'; break; 
 case "07": $mesec = 'Juli'; break; 
 case "08": $mesec = 'Avgust'; break; 
 case "09": $mesec = 'Septembar'; break; 
 case "10": $mesec = 'Oktobar'; break; 
 case "11": $mesec = 'Novembar'; break; 
 case "12": $mesec = 'Decembar'; break; 
 }
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 
 $output_prev.= '<strong>'.$mesec.' - '. $year.'</strong>';
 $output_prev.= '<table width="100%" align="center"  border="0" cellspacing="0" cellpadding="0">
 <tr>';
 $output_prev.= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr>';
 $day_count = 1;
 while ($blank > 0) 
 { 
 $output_prev.= '<td></td>'; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //count up the days, untill we've done all of them in the month
 $day_num = 1;
 while ( $day_num <= $days_in_month ) 
 { 
	 if ($day_num<10){ $day_num0='0'.$day_num; }
	 else { $day_num0=$day_num; }
 $output_prev.= '<td><a href="dan.php?dan='.$year.'-'.$month.'-'.$day_num0.'" class="btn btn-default btn-xs btn-block" role="button">'.$day_num0.'</a></td>'; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 $output_prev.= '</tr><tr>';
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 $output_prev.= '<td> </td>'; 
 $day_count++; 
 } 
 
 $output_prev.= '</tr></table>'; 

	echo $output_prev;

// Now
$boja='default';
$date = date(strtotime("-0 months"));
 $day = date('d', $date) ; 
 $month = date('m', $date); 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 //$title = date('F', $first_day) ;
 switch($month){ 
 case "01": $mesec = 'Januar'; break; 
 case "02": $mesec = 'Februar'; break; 
 case "03": $mesec = 'Mart'; break; 
 case "04": $mesec = 'April'; break; 
 case "05": $mesec = 'Maj'; break; 
 case "06": $mesec = 'Juni'; break; 
 case "07": $mesec = 'Juli'; break; 
 case "08": $mesec = 'Avgust'; break; 
 case "09": $mesec = 'Septembar'; break; 
 case "10": $mesec = 'Oktobar'; break; 
 case "11": $mesec = 'Novembar'; break; 
 case "12": $mesec = 'Decembar'; break; 
 }
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 
 $output_now.= '<strong>'.$mesec.' - '. $year.'</strong>';
 $output_now.= '<table width="100%" align="center"  border="0" cellspacing="0" cellpadding="0">
 <tr>';
 $output_now.= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr>';
 $day_count = 1;
 while ($blank > 0) 
 { 
 $output_now.= '<td></td>'; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //count up the days, untill we've done all of them in the month
 $day_num = 1;
 while ( $day_num <= $days_in_month ) 
 {
	 if ($day_num<10){ $day_num0='0'.$day_num; }
	 else { $day_num0=$day_num; }
	 if ($day_num0==$day) {$boja='info';}
	 else {$boja='default';}
 $output_now.= '<td><a href="dan.php?dan='.$year.'-'.$month.'-'.$day_num0.'" class="btn btn-'.$boja.' btn-xs btn-block" role="button">'.$day_num0.'</a></td>'; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 $output_now.= '</tr><tr>';
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 $output_now.= '<td> </td>'; 
 $day_count++; 
 } 
 
 $output_now.= '</tr></table>'; 

	echo $output_now;

// Next
$date = date(strtotime("+1 months"));
 $day = date('d', $date) ; 
 $month = date('m', $date); 
 $year = date('Y', $date) ;
 //Here we generate the first day of the month 
 $first_day = mktime(0,0,0,$month, 1, $year) ; 
 //This gets us the month name 
 //$title = date('F', $first_day) ;
 switch($month){ 
 case "01": $mesec = 'Januar'; break; 
 case "02": $mesec = 'Februar'; break; 
 case "03": $mesec = 'Mart'; break; 
 case "04": $mesec = 'April'; break; 
 case "05": $mesec = 'Maj'; break; 
 case "06": $mesec = 'Juni'; break; 
 case "07": $mesec = 'Juli'; break; 
 case "08": $mesec = 'Avgust'; break; 
 case "09": $mesec = 'Septembar'; break; 
 case "10": $mesec = 'Oktobar'; break; 
 case "11": $mesec = 'Novembar'; break; 
 case "12": $mesec = 'Decembar'; break; 
 }
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 
 //Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
 switch($day_of_week){ 
 case "Mon": $blank = 0; break; 
 case "Tue": $blank = 1; break; 
 case "Wed": $blank = 2; break; 
 case "Thu": $blank = 3; break; 
 case "Fri": $blank = 4; break; 
 case "Sat": $blank = 5; break; 
 case "Sun": $blank = 6; break; 
 }
 //We then determine how many days are in the current month
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 //Here we start building the table heads 
 
 $output_next.= '<strong>'.$mesec.' - '. $year.'</strong>';
 $output_next.= '<table width="100%" align="center"  border="0" cellspacing="0" cellpadding="0">
 <tr>';
 $output_next.= '<td>P</td><td>U</td><td>S</td><td>Č</td><td>P</td><td>S</td><td>N</td>
 </tr><tr>';
 $day_count = 1;
 while ($blank > 0) 
 { 
 $output_next.= '<td></td>'; 
 $blank = $blank-1; 
 $day_count++;
 } 
 //count up the days, untill we've done all of them in the month
 $day_num = 1;
 while ( $day_num <= $days_in_month ) 
 { 
	 if ($day_num<10){ $day_num0='0'.$day_num; }
	 else { $day_num0=$day_num; }
 $output_next.= '<td><a href="dan.php?dan='.$year.'-'.$month.'-'.$day_num0.'" class="btn btn-default btn-xs btn-block" role="button">'.$day_num0.'</a></td>'; 
 $day_num++; 
 $day_count++;
 //Make sure we start a new row every week
 if ($day_count > 7)
 {
 $output_next.= '</tr><tr>';
 $day_count = 1;
 }
 } 
 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 ) 
 { 
 $output_next.= '<td> </td>'; 
 $day_count++; 
 } 
 
 $output_next.= '</tr></table>'; 

	echo $output_next;


?>                           </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        // Create two variable with the names of the months and days in an array
        var monthNames = ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Octobar", "Novembar", "Decembar"];
        var dayNames = ["Nedelja", "Ponedeljak", "Utorak", "Sreda", "Četvrtak", "Petak", "Subota"]

        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year    
        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        setInterval(function() {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html((seconds < 10 ? "0" : "") + seconds);
        }, 1000);

        setInterval(function() {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html((minutes < 10 ? "0" : "") + minutes);
        }, 1000);

        setInterval(function() {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html((hours < 10 ? "0" : "") + hours);
        }, 1000);

    });
</script>






</html>