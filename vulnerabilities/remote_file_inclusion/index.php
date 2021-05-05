<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Remote File Inclusion - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>Remote File Inclusion</h1>
    <?php
    // Check if the right PHP functions are enabled
    if (!ini_get('allow_url_include')) { ?>
        <div class="text-danger">The PHP function <span class="fst-italic">allow_url_include</span> is not enabled.</div>
    <?php }
    if (!ini_get('allow_url_fopen')) { ?>
        <div class="text-danger">The PHP function <span class="fst-italic">allow_url_fopen</span> is not enabled.</div>
    <?php } ?>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <h5 class="card-title">Select Website</h5>
                <div>
                    <div><a href="?web=https://www.york.ac.uk/teaching/cws/wws/webpage1.html">HTML Tutorial</a></div>
                    <div><a href="?web=http://wttr.in/">Weather Forecast</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Result-->
    <?php if (isset($_GET['web'])) { ?>

        <?php
        //Include Unsecure Code 
        include('source/low.php');
        include($file);

        ?>
        <!-- End of View Result-->

        <!--View Improve Result-->
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
                        if ($found) {
                            include($file);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--End of View Improve Result-->

    <?php
    // view source
    $vulnerability = "Remote File Inclusion";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>


    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://en.wikipedia.org/wiki/File_inclusion_vulnerability" target="_blank">File inclusion vulnerability by Wikipedia</a></li>
            <li><a href="https://owasp.org/www-project-web-security-testing-guide/latest/4-Web_Application_Security_Testing/07-Input_Validation_Testing/11.2-Testing_for_Remote_File_Inclusion" target="_blank">Testing for Remote File Inclusion by OWASP</a></li>
        </ul>
    </div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>