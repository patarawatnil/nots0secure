<?php
$TO_ROOT = constant("WEB_PAGE_TO_ROOT");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo $TO_ROOT ?>static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Title -->
    <title><?php echo $title; ?></title>

    <!-- favicon-->
    <link rel="shortcut icon" href="<?php echo $TO_ROOT ?>static/image/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <!-- Container -->
        <div class="container">
            <!-- Brand to Home -->
            <a class="navbar-brand" href="<?php echo $TO_ROOT ?>."><img
                    src="<?php echo $TO_ROOT ?>static/image/logo.png" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                NOTS0SECURE</a>
            <!-- Button when collapse -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <!-- Vulnerabilities dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vulnerabilities
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <!-- SQL Injection -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/sql_injection">SQL Injection</a></li>
                        </ul>
                    </li>
                    <!-- About -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $TO_ROOT ?>about.php">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>