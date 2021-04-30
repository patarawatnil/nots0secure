<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "SQL Injection - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>SQL Injection</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="get" name="find_userid">
                    <h5 class="card-title">Find User by ID</h5>
                    <!-- Enter user id -->
                    <div class="mt-3">
                        <label for="userid" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter User ID" required>
                    </div>
                    <!-- Submit -->
                    <div class="mt-3">
                        <input type="submit" name="Submit" value='Submit' class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- View Result-->
    <?php if (isset($_GET['Submit'])) { ?>

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

                <p>
                    A SQL injection attack consists of insertion or "injection" of a SQL query via the input data from
                    the client to
                    the application. A successful SQL injection exploit can read sensitive data from the database,
                    modify database
                    data (insert/update/delete), execute administration operations on the database (such as shutdown the
                    DBMS),
                    recover the content of a given file present on the DBMS file system (load_file) and in some cases
                    issue commands
                    to the operating system.
                </p>

                <p>
                    SQL injection attacks are a type of injection attack, in which SQL commands are injected into
                    data-plane input
                    in order to effect the execution of predefined SQL commands.
                </p>

                <p>
                    This attack may also be called "SQLi".
                </p>
            </div>
        </div>
    </div>
    <!-- End of View Help -->


    <?php
    // view source
    $vulnerability = "SQL Injection";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>


    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://www.securiteam.com/securityreviews/5DP0N1P76E.html" target="_blank">SQL Injection Walkthrough by SecuriTeam</a></li>
            <li><a href="https://en.wikipedia.org/wiki/SQL_injection" target="_blank">SQL injection by Wikipedia</a></li>
            <li><a href="https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/" target="_blank">SQL Injection Cheat Sheet by Netsparker</a></li>
            <li><a href="https://owasp.org/www-community/attacks/SQL_Injection" target="_blank">SQL Injection by OWASP</a></li>
            <li><a href="https://bobby-tables.com/">Who is Bobby Tables?</a></li>
        </ul>
    </div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>