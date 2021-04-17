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

<body>
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
            color:cornflowerblue;
        }

        #Date {
            font-weight: bold;
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
            font-size: 2.5rem;
            font-weight: bold;
            display: inline;
        }

        #point {
            font-weight: bold;
            display: inline;
        }
    </style>

    <div class="columns-bg">



        <!-- Logo & Intro -->
        <section id="logo" class="tm-section-logo">
        <div class="container-fluid">
          <div class="row">                  

          <div class="detail-colors"><a style="color: #cee6ec;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #ed3c76;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #f7a8b6;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #85acda;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #f6869c;" class="detail-colors-chunk" href="javascript:;"></a></div>

          <div class="detail-colors"><a style="color: #7d8ada;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #dc96e3;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #040404;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #51c5e0;" class="detail-colors-chunk" href="javascript:;"></a><a style="color: #34b4d8;" class="detail-colors-chunk" href="javascript:;"></a></div>
          
            <div class="col-sm-12 offset-sm-0 col-md-6 offset-md-6">
             <h1 class="text-uppercase tm-text-primary tm-site-name">
                  <span style="font-size: 6.5rem;">Pro</span>
                  <span style="font-size: 3.5rem;">fi</span>
                  <span style="font-size: 4.5rem;">le</span>

                </h1> <div class="tm-site-name-container">                  

              <h1 class="text-uppercase tm-text-primary tm-site-name">
                <div class="tm-site-name-container-inner">
                   
                    
              
                  <div
              class="tm-img-right-container ">
               <div class="clock">
                        <div id="hours"></div>
                        <div id="point">:</div>
                        <div id="min"></div>
                        <div id="point">:</div>
                        <div id="sec"></div>
            </div>
                 
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
                            <p class="mb-0">
                                Quisque rutrum dapibus odio vitae tincidunt. Etiam
                                sollicitudin augue non porta interdum. Pellentesque placerat
                                orci at libero ornare, nec viverra justo lobortis. Phasellus
                                venenatis eros non.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 tm-section-image-container tm-img-right-container">
                        <img src="img/his-profile.png" alt="Image" class="img-fluid tm-img-right" />
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
                        <form action="index.html" method="POST" class="tm-contact-form">
                            <div class="form-group">
                                <input type="text" id="contact_name" name="contact_name" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Your Name" required />
                            </div>
                            <div class="form-group">
                                <input type="email" id="contact_email" name="contact_email" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <textarea rows="4" id="contact_message" name="contact_message" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Message" required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn tm-btn-submit rounded-0">
                                    Send
                                </button>
                            </div>
                        </form>
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