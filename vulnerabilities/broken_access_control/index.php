<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Broken Access Control - NOTS0SECURE";



// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>

<div class="container">
    <h1>Broken Access Control</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="get">
                    <h5 class="card-title">View your profile</h5>
                    <!-- Hidden User ID Input -->
                    <div class="mt-3">
                        <div id="userid" class="form-text">This form will send userid dummy to view thier profile.</div>
                        <input type="hidden" id="userid" name="userid" value="6" />
                    </div>
                    <!-- Submit -->
                    <div class="mt-3">
                        <input type="submit" value="View" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Result-->
    <?php
    if (isset($_GET['userid'])) { ?>

        <div class="fw-bold mt-3">Result</div>

        <?php
        //Include Unsecure Code 
        include('source/low.php');
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
                        //Include Improve Code 
                        include('source/improve.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End of Source-->

    <?php
    // view source
    $vulnerability = "Broken Access Control";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>

    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://owasp.org/www-community/Broken_Access_Control" target="_blank">Broken Access Control by OWASP</a></li>
            <li><a href="https://avatao.com/blog-broken-access-control/" target="_blank">Broken Access Control by Márton Németh</a></li>
            <li><a href="https://hdivsecurity.com/owasp-broken-access-control" target="_blank">Broken Access Control by Hdiv</a></li>
            <li><a href="https://www.packetlabs.net/broken-access-control/" target="_blank">Broken Access Control: Hidden Exposure for Sensitive Data by Packetlabs</a></li>
        </ul>
    </div>

</div>

<?php

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>