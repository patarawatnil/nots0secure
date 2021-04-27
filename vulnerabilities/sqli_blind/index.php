<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "SQL Injection (Blind) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>SQL Injection (Blind)</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="get" name="find_userid">
                    <h5 class="card-title">Is that User ID exist?</h5>
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
        include('source/low.php')

        ?>
    <?php } ?>
    <!-- End of View Result-->

    <!--View Improve Result-->
    <?php if (isset($_GET['Submit'])) { ?>
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
                    When an attacker executes SQL injection attacks, sometimes the server responds with error messages from the database server complaining that the SQL query's syntax is incorrect. Blind SQL injection is identical to normal SQL Injection except that when an attacker attempts to exploit an application, rather then getting a useful error message, they get a generic page specified by the developer instead. This makes exploiting a potential SQL Injection attack more difficult but not impossible. An attacker can still steal data by asking a series of True and False questions through SQL statements, and monitoring how the web application response (valid entry retunred or 404 header set).
                </p>

                <p>
                    "time based" injection method is often used when there is no visible feedback in how the page different in its response (hence its a blind attack). This means the attacker will wait to see how long the page takes to response back. If it takes longer than normal, their query was successful.
                </p>

            </div>
        </div>
    </div>
    <!-- End of View Help -->

    <?php
    // view source
    $vulnerability = "SQL Injection (Blind)";
    include_once(WEB_PAGE_TO_ROOT . "/vulnerabilities/source.php");
    ?>

    <!-- More Info -->
    <div class="mt-3">
        <h2>More Infomation</h2>
        <ul>
            <li><a href="https://www.securiteam.com/securityreviews/5DP0N1P76E.html" target="_blank">SQL Injection
                    Walkthrough by
                    SecuriTeam</a></li>
            <li><a href="https://en.wikipedia.org/wiki/SQL_injection" target="_blank">SQL injection by Wikipedia</a>
            </li>
            <li><a href="https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/" target="_blank">SQL
                    Injection Cheat
                    Sheet by Netsparker</a></li>
            <li><a href="http://pentestmonkey.net/cheat-sheet/sql-injection/mysql-sql-injection-cheat-sheet" target="_blank">MySQL SQL Injection Cheat Sheet by pentestmonkey</a></li>
            <li><a href="https://owasp.org/www-community/attacks/Blind_SQL_Injection" target="_blank">Blind SQL Injection by OWASP</a></li>
            <li><a href="https://bobby-tables.com/">Who is Bobby Tables?</a></li>
        </ul>
    </div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>