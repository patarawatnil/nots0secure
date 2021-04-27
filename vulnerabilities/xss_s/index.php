<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Stored Cross Site Scripting (XSS) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>Stored Cross Site Scripting (XSS)</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="post" name="comment">
                    <h5 class="card-title">Post a Comment</h5>
                    <!-- Enter name -->
                    <div class="mt-3">
                        <label for="txtName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter your name" maxlength="20" required>
                        <div id="namehelp" class="form-text">Maximum 20 character</div>
                    </div>
                    <!-- Enter comment -->
                    <div class="mt-3">
                        <label for="txtComment" class="form-label">Comment</label>
                        <textarea class="form-control" id="txtComment" name="txtComment" rows="5" placeholder="What's on your mind?" maxlength="100" required></textarea>
                        <div id="namehelp" class="form-text">Maximum 100 character</div>
                    </div>
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
                        <input type="submit" name="btnComment" value='Comment' class="btn btn-primary">
                        <input type="reset" value='Clear Comment' class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- Use Unsecure-->
    <?php if (!isset($_POST['useimprove'])) {
        //Include Unsecure Code 
        include('source/low.php');
    } ?>
    <!-- End of Unsecure-->

    <!--Use Improve -->
    <?php if (isset($_POST['useimprove'])) {
        //Include Improve Code 
        include('source/improve.php');
    } ?>
    <!--End of Improve-->

    <!-- View Comment -->
    <div class="mt-3">
        <h5>Comment</h5>
        <?php

        if (!isset($_POST['btnComment'])) {
            include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
            $dbservername = DB_HOST;
            $dbusername = DB_USERNAME;
            $dbpassword = DB_PASSWORD;
            $dbname = DB_NAME;
        }

        try {
            // make connection
            $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // select from guestbook
            $sql = "SELECT name, comment FROM guestbook;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                if (isset($_POST['useimprove'])) {
                    $name    = htmlspecialchars($row[0]);
                    $comment = htmlspecialchars($row[1]);
                } else {
                    $name    = $row[0];
                    $comment = $row[1];
                }
        ?>
                <div class="mt-3"><span class="fw-bold"><?php echo $name; ?></span> say :</div>
                <div class="card">
                    <div class="card-body">
                        <div><?php echo $comment; ?></div>
                    </div>
                </div>
        <?php
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
        ?>
    </div>
    <!-- End of View Comment -->

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
                    "Cross-Site Scripting (XSS)" attacks are a type of injection problem, in which malicious scripts are injected into the otherwise benign and trusted web sites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application using input from a user in the output, without validating or encoding it.
                </p>

                <p>
                    An attacker can use XSS to send a malicious script to an unsuspecting user. The end user's browser has no way to know that the script should not be trusted, and will execute the JavaScript. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by your browser and used with that site. These scripts can even rewrite the content of the HTML page.
                </p>

                <p>
                    The XSS is stored in the database. The XSS is permanent, until the database is reset or the payload is manually deleted.
                </p>
            </div>
        </div>
    </div>
    <!-- End of View Help -->

    <?php
    // view source
    $vulnerability = "Stored XSS";
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