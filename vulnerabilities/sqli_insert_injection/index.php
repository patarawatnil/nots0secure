<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "SQL Injection (Insert Injection) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>SQL Injection (Insert Injection)</h1>

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
            <li><a href="http://amolnaik4.blogspot.com/2012/02/sql-injection-in-insert-query.html" target="_blank">SQL Injection in INSERT Query by AMol NAik</a></li>
            <li><a href="https://portswigger.net/support/sql-injection-in-different-statement-types" target="_blank">SQL Injection in Different Statement Types by  PortSwigger</a></li>
        </ul>
    </div>

</div>

<?php

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>