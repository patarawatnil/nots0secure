<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Local File Inclusion - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>Local File Inclusion</h1>
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
                <h5 class="card-title">Select File to view</h5>
                <div>
                    [<a href="?page=file1.php">file1.php</a>] - [<a href="?page=file2.php">file2.php</a>] - [<a href="?page=file3.php">file3.php</a>]
                </div>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Result-->
    <?php if (isset($_GET['page'])) { ?>

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
                    Some web applications allow the user to specify input that is used directly into file streams or allows the user to upload files to the server. At a later time the web application accesses the user supplied input in the web applications context. By doing this, the web application is allowing the potential for malicious file execution.
                </p>

                <p>
                    If the file chosen to be included is local on the target machine, it is called "Local File Inclusion (LFI). But files may also be included on other machines, which then the attack is a "Remote File Inclusion (RFI).
                </p>

                <p>
                    When RFI is not an option. using another vulnerability with LFI (such as file upload and directory traversal) can often achieve the same effect.
                </p>

                <p>
                    Note, the term "file inclusion" is not the same as "arbitrary file access" or "file disclosure".
                </p>
            </div>
        </div>
    </div>
    <!-- End of View Help -->


    <?php
    // view source
    $vulnerability = "Local File Inclusion";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>


    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://en.wikipedia.org/wiki/File_inclusion_vulnerability" target="_blank">File inclusion vulnerability by Wikipedia</a></li>
            <li><a href="https://owasp.org/www-project-web-security-testing-guide/latest/4-Web_Application_Security_Testing/07-Input_Validation_Testing/11.1-Testing_for_Local_File_Inclusion" target="_blank">Testing for Local File Inclusion by OWASP</a></li>
        </ul>
    </div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>