<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>

    <!-- META -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Delphine Idiart">

    <title>Pokemon Battle</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="views/css/style.css">

</head>
<body>
<header>
    <!--MENU -->
    <nav class="navbar navbar-inverse .navbar-fixed-top" id="menu">
        <div class="container">

            <!-- MENU MOBILE -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- LOGO -->
                <a class="navbar-brand" href="index.php"id="logo"><img src="views/css/logo.png" alt="logo_pokeball" ></a>
            </div>

            <!-- MENU WEB -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="sign_in.php">Connexion/Inscription</a></li>
                    <li><a href="index.php">Votre Pokemon</a></li>
                    <li><a href="opponents.php">A l'assaut !</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>