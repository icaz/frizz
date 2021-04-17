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
    <style>
    @keyframes alertPulse {
        0% { color: yellow; opacity: 1; font-size: 0.8em;}
        50% {color: red; opacity: 1; font-size: 2em; text-decoration-line: underline;}
        100% {opacity: black; color: yellow; opacity: 1; font-size: 0.8em;}
    }
    .alertPulse-css {
        animation: alertPulse 2s ease-out;
        animation-iteration-count: infinite;
        text-overflow: ellipsis;
        font-size: 0.8em;
        opacity: 1;
        color: yellow; /* you need this to specify a color to pulse to */
    }
    @keyframes alertPulse2 {
        0% { color: red; opacity: 1; font-size: 1em;}
        50% {color: yellow; opacity: 1; font-size: 0.8em;}
        100% {opacity: black; color: red; opacity: 1; font-size: 1em;}
    }
    .alertPulse2-css {
        animation: alertPulse2 2s ease-out;
        animation-iteration-count: infinite;
        transform: translateY(200px);
        font-size: 1em;
        opacity: 1;
        color: red; /* you need this to specify a color to pulse to */
    }
    </style>
</head>
