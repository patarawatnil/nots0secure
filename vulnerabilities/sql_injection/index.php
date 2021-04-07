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
    <div class="card mt-3 mx-auto" style="width: 18rem;">
        <div class="card-body">
            <!-- Form will submit to same page-->
            <form method="get" name="find_userid">
                <h5 class="card-title">Find User by ID</h5>
                <!-- Enter user id -->
                <div class="mt-3">
                    <label for="userid" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="userid" name="userid" placeholder="1" required>
                </div>
                <!-- Submit -->
                <div class="mt-3">
                    <input type="submit" name="Submit" value='Submit' class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <!-- End of Form -->

<!--View Result-->
<?php if (isset($_GET['Submit'])) { ?>

    <p class="fw-bold">Result</p>
    
    <?php
    //Include Unsecure Code 
    include('source/low.php')

    ?>
<?php } ?>

    <!-- View Help -->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewhelp"
            aria-expanded="false" aria-controls="viewhelp">
            View Help
        </button>
    </div>

    <div class="collapse" id="viewhelp">
        <div class="mt-3">
            <div class="card card-body">

                <p class="fw-bold">Description</p>

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

    <!--View Source-->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewsource"
            aria-expanded="false" aria-controls="viewsource">
            View Source
        </button>
    </div>
    <div class="collapse" id="viewsource">
        <div class="mt-3 text-wrap">
            <div class="card card-body">
                <p class="fw-bold">Unsecure SQL Injection Source</p>
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

    <!--View Improve Result-->
    <?php if (isset($_GET['Submit'])) { ?>
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimproveresult"
            aria-expanded="false" aria-controls="viewimproveresult">
            View Improve Result
        </button>
    </div>
    <div class="collapse" id="viewimproveresult">
        <div class="card card-body">
            <div>
                <?php
                    include('source/improve.php');
                    ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <!--End of View Improve Result-->

    <!--View Improve Source-->
    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimprovesource"
            aria-expanded="false" aria-controls="viewimprovesource">
            View Improve Source
        </button>
    </div>
    <div class="collapse" id="viewimprovesource">
        <div class="mt-3 text-wrap">
            <div class="card card-body">
                <p class="fw-bold">Improve SQL Injection Source</p>
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

</div>

<?php


// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>