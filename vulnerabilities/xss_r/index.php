<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Reflected Cross Site Scripting (XSS) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>Reflected Cross Site Scripting (XSS)</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="post" name="createpost">
                    <h5 class="card-title">Create a Post</h5>
                    <!-- Enter post -->
                    <div class="mt-3">
                        <label for="postarea" class="form-label">Post</label>
                        <textarea class="form-control" id="postarea" name="postarea" rows="5" placeholder="What's on your mind?" required></textarea>
                    </div>
                    <!-- Submit -->
                    <div class="mt-3">
                        <input type="submit" name="submit" value='Submit' class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Result-->
    <?php if (isset($_POST['submit'])) { ?>

        <div class="fw-bold mt-3">Result</div>

        <?php
        //Include Unsecure Code 
        include('source/low.php')

        ?>
    <?php } ?>
    <!-- End of View Result-->

    <!--View Improve Result-->
    <?php if (isset($_POST['submit'])) { ?>
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

                <p>"Cross-Site Scripting (XSS)" attacks are a type of injection problem, in which malicious scripts are injected into the otherwise benign and trusted web sites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application using input from a user in the output, without validating or encoding it.</p>

                <p>An attacker can use XSS to send a malicious script to an unsuspecting user. The end user's browser has no way to know that the script should not be trusted, and will execute the JavaScript. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by your browser and used with that site. These scripts can even rewrite the content of the HTML page.</p>

                <p>Because its a reflected XSS, the malicious code is not stored in the remote web application, so requires some social engineering (such as a link via email/chat).</p>

            </div>
        </div>
    </div>
    <!-- End of View Help -->

    <?php
    // view source
    $vulnerability = "Reflected XSS";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>

    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://owasp.org/www-community/attacks/xss/" target="_blank">Cross Site Scripting (XSS) by OWASP</a></li>
            <li><a href="https://owasp.org/www-community/xss-filter-evasion-cheatsheet" target="_blank">XSS Filter Evasion Cheat Sheet by OWASP</a></li>
            <li><a href="https://en.wikipedia.org/wiki/Cross-site_scripting" target="_blank">Cross-site scripting by Wikipedia</a></li>
            <li><a href="https://www.cgisecurity.com/xss-faq.html" target="_blank">The Cross-Site Scripting (XSS) FAQ by CGISecurity</a></li>
            <li><a href="http://www.scriptalert1.com/" target="_blank">Cross-Site Scripting (XSS) by Ryan Dewhurst & Thomas MacKenzie</a></li>
        </ul>
    </div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>