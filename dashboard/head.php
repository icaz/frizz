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
    <link rel="stylesheet" href="admin/dist/css/adminlte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    @keyframes alertPulse {
        0% { color: whitesmoke; opacity: 1; font-size: 0.9em;}
        50% {color: red; opacity: 1; font-size: 1em; text-decoration-line: underline;}
        100% {opacity: black; color: whitesmoke; opacity: 1; font-size: 0.9em;}
    }
    .alertPulse-css {
        animation: alertPulse 2s ease-out;
        animation-iteration-count: infinite;
        text-overflow: ellipsis;
        font-size: 0.9em;
        opacity: 1;
        color: yellow; /* you need this to specify a color to pulse to */
    }
    @keyframes alertPulse2 {
        0% { color: red;}
        50% {color: blue;}
        100% {color: red;}
    }
    .alertPulse2-css {
        animation: alertPulse2 4s ease-out;
        animation-iteration-count: infinite;
        color: red; /* you need this to specify a color to pulse to */
        font-weight: bolder;
        border: 1px solid red;
    }

    @keyframes formPulse {
        0% {border: 1px solid red;}
        50% {border: 1px dotted grey;}
        100% {border: 1px solid red;}
    }
    .formPulse-css {
        animation: formPulse 2s ease-out;
        animation-iteration-count: infinite;
        font-weight: bolder;
        border: 1px solid red;
    }

    
    </style>
</head>
