<?php 

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Weak Session IDs - NOTS0SECURE";

//<!-- Use Source setcookie() function must appear BEFORE the <html> tag -->
    if (!isset($_POST['useimprove'])) {
        //Include Unsecure Code 
        include('source/low.php');
    } else{
        //Include Improve Code 
        include('source/improve.php');
    }
    //<!-- End of Source-->

// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>

<div class="container">
    <h1>Weak Session IDs</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="post" >
                    <h5 class="card-title">Generate Session ID</h5>
                    <!-- Use Improve -->
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="useimprove" id="useimprove" name="useimprove">
                        <label class="form-check-label" for="useimprove">
                            Use Improve Source Code
                        </label>
                        <div id="useimprovehelp" class="form-text">If check will use improve source code</div>
                    </div>
                    <!-- Submit -->
                    <div class="mt-3">
                        <div id="generate" class="form-text">This page will set a new cookie called nots0secureSession each time the button is clicked.</div>
                        <input type="submit" value="Generate" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Help -->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewhelp" aria-expanded="false" aria-controls="viewhelp">
            View Help
        </button>
    </div>

    <div class="collapse" id="viewhelp">
        <div class="mt-3">
            <div class="card card-body">

                <h3>Description</h3>

                <p>
                Knowledge of a session ID is often the only thing required to access a site as a specific user after they have logged in, if that session ID is able to be calculated or easily guessed, then an attacker will have an easy way to gain access to user accounts without having to brute force passwords or find other vulnerabilities such as Cross-Site Scripting.
                </p>
            </div>
        </div>
    </div>
    <!-- End of View Help -->

    <!--View Source-->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewsource" aria-expanded="false" aria-controls="viewsource">
            View Unsecure Source
        </button>
    </div>
    <div class="collapse" id="viewsource">
        <div class="mt-3 text-wrap">
            <div class="card card-body">
                <h3>Unsecure SQL Injection Source</h3>
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
                <h3>Improve SQL Injection Source</h3>
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
            <li><a href="https://owasp.org/www-project-web-security-testing-guide/latest/4-Web_Application_Security_Testing/06-Session_Management_Testing/01-Testing_for_Session_Management_Schema" target="_blank">Testing for Session Management Schema by WTSG</a></li>
            <li><a href="https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html" target="_blank">Session Management Cheat Sheet by OWASP</a></li>
        </ul>
    </div>

</div>

<?php 

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>