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
    <?php if (isset($title)) {
        $title = "NOTS0SECURE";
    } ?>
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
            <a class="navbar-brand" href="<?php echo $TO_ROOT ?>."><img src="<?php echo $TO_ROOT ?>static/image/logo.png" alt="nots0secure" width="30" height="30" class="d-inline-block align-text-top">
                NOTS0SECURE</a>
            <!-- Button when collapse -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Vulnerabilities dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Vulnerabilities
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <!-- SQL Injection -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/sql_injection">SQL Injection</a></li>
                            <!-- SQL Injection (Blind) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/sqli_blind">SQL Injection (Blind)</a></li>
                            <!-- SQL Injection (Bypass Authentication) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/sqli_bypass_authentication">SQL Injection (Bypass Authentication)</a></li>
                            <!-- SQL Injection (Insert Injection) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/sqli_insert_injection">SQL Injection (Insert Injection)</a></li>
                            <!-- Command Injection -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/command_injection">Command Injection</a></li>
                            <!-- Brute Force -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/brute_force">Brute Force</a></li>
                            <!-- Broken Access Control -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/broken_access_control">Broken Access Control</a></li>
                            <!-- Weak Session IDs -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/weak_id">Weak Session IDs</a></li>
                            <!-- Cross Site Request Forgery (CSRF) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/csrf">Cross Site Request Forgery (CSRF)</a></li>
                            <!-- DOM Based Cross Site Scripting (XSS) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/xss_d">DOM Based Cross Site Scripting (XSS)</a></li>
                            <!-- Reflected Cross Site Scripting (XSS) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/xss_r">Reflected Cross Site Scripting (XSS)</a></li>
                            <!-- Stored Cross Site Scripting (XSS) -->
                            <li><a class="dropdown-item" href="<?php echo $TO_ROOT ?>vulnerabilities/xss_s">Stored Cross Site Scripting (XSS)</a></li>
                        </ul>
                    </li>

                    <!-- About -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $TO_ROOT ?>about.php">About</a>
                    </li>
                </ul>
                <form method="POST" action="<?php echo $TO_ROOT ?>static/dbms/MySQL.php" class="d-flex">
                    <button type="submit" name="reset_db" id="reset_db" class="btn btn-outline-light">Setup/Reset Database</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Empty box for spacing between Navbar and content -->
    <div class="mb-5 pb-3"></div>