<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "SQL Injection (Bypass Authentication) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>

<div class="container">
    <h1>SQL Injection (Bypass Authentication)</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3"">
        <div class=" card-body">
            <!-- Form will submit to same page-->
            <form method="post" name="login">
                <h5 class="card-title">Login</h5>
                <!-- Enter username -->
                <div class="mt-3">
                    <label for="userid" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                </div>
                <!-- Enter password -->
                <div class="mt-3">
                    <label for="userid" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                </div>
                <!-- Submit -->
                <div class="mt-3">
                    <input type="submit" name="login" value='Submit' class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Form -->

<!--View Result-->
<?php if (isset($_POST['login'])) { ?>

    <div class="fw-bold mt-3">Result</div>

    <?php
    //Include Unsecure Code 
    include('source/low.php')

    ?>
<?php } ?>

<!--View Improve Result-->
<?php if (isset($_POST['login'])) { ?>
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimproveresult" aria-expanded="false" aria-controls="viewimproveresult">
            View Improve Result
        </button>
    </div>
    <div class="collapse" id="viewimproveresult">
        <div class="mt-3">
            <div class="card card-body">
                <div>
                    <?php
                    include('source/improve.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--End of View Improve Result-->

<!--View Source-->
<div class="mt-3">
    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewsource" aria-expanded="false" aria-controls="viewsource">
        View Unsecure Source
    </button>
</div>
<div class="collapse" id="viewsource">
    <div class="mt-3 text-wrap">
        <div class="card card-body">
            <h3>Unsecure SQL Injection SQL Injection (Bypass Authentication) Source</h3>
            <code><?php
                    $source_code = file_get_contents('./source/low.php');
                    $source_code = str_replace(array('$html .='), array('echo'), $source_code);
                    $source_code = highlight_string($source_code, true);

                    echo $source_code;

                    ?></code>
        </div>
    </div>
</div>
<!--End of View Source-->

<!--View Improve Source-->
<div class="mt-3">
    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimprovesource" aria-expanded="false" aria-controls="viewimprovesource">
        View Improve Source
    </button>
</div>
<div class="collapse" id="viewimprovesource">
    <div class="mt-3 text-wrap">
        <div class="card card-body">
            <h3>Improve SQL Injection SQL Injection (Bypass Authentication) Source</h3>
            <code><?php
                    $source_code = file_get_contents('./source/improve.php');
                    $source_code = str_replace(array('$html .='), array('echo'), $source_code);
                    $source_code = highlight_string($source_code, true);

                    echo $source_code;

                    ?></code>
        </div>
    </div>
</div>
<!--End of View Improve Source-->

<!-- More Info -->
<div class="mt-3">
    <h2>More Infomation</h2>
    <ul>
    <li><a href="https://www.securiteam.com/securityreviews/5DP0N1P76E.html" target="_blank">SQL Injection Walkthrough by SecuriTeam</a></li>
    <li><a href="https://en.wikipedia.org/wiki/SQL_injection" target="_blank">SQL injection by Wikipedia</a>
        <li><a href="https://portswigger.net/support/using-sql-injection-to-bypass-authentication" target="_blank">Using SQL Injection to Bypass Authentication by PortSwigger</a></li>
        <li><a href="http://www.securityidiots.com/Web-Pentest/SQL-Injection/bypass-login-using-sql-injection.html" target="_blank">Login Bypass Using SQL Injection by Security Idiots</a></li>
    </ul>
</div>



</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>