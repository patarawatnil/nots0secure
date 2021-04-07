<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "SQL Injection - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>

<div class="container">
    <h1>Brute Force</h1>

    <div class="d-flex justify-content-center align-items-center">
        <!-- Card to contain form -->
        <div class="card mt-3"">
        <div class=" card-body">
            <!-- Form will submit to same page-->
            <form method="post" name="login">
                <h5 class="card-title">Login</h5>
                <!-- Enter username -->
                <div class="mt-3">
                    <label for="userid" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username"
                        required>
                </div>
                <!-- Enter username -->
                <div class="mt-3">
                    <label for="userid" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter Password" required>
                </div>
                <!-- Submit -->
                <div class="mt-3">
                    <input type="submit" name="login" value='Submit' class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Form -->

<!--View Result-->
<?php if (isset($_POST['login'])) { ?>

<div class="fw-bold">Result</div>

<?php
    //Include Unsecure Code 
    include('source/low.php')

    ?>
<?php } ?>

<!--View Improve Result-->
<?php if (isset($_POST['login'])) { ?>
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

            <h3>Description</h3>

            <p>
                Password cracking is the process of recovering passwords from data that has been stored in or
                transmitted by a computer system. A common approach is to repeatedly try guesses for the password.
            </p>

            <p>
                Users often choose weak passwords. Examples of insecure choices include single words found in
                dictionaries, family names, any too short password (usually thought to be less than 6 or 7 characters),
                or predictable patterns (e.g. alternating vowels and consonants, which is known as leetspeak, so
                "password" becomes "p@55w0rd").
            </p>

            <p>
                Creating a targeted wordlists, which is generated towards the target, often gives the highest success
                rate. There are public tools out there that will create a dictionary based on a combination of company
                websites, personal social networks and other common information (such as birthdays or year of
                graduation).
            </p>

            <p>
                A last resort is to try every possible password, known as a brute force attack. In theory, if there is
                no limit to the number of attempts, a brute force attack will always be successful since the rules for
                acceptable passwords must be publicly known; but as the length of the password increases, so does the
                number of possible passwords making the attack time longer.
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
    <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#viewimprovesource"
        aria-expanded="false" aria-controls="viewimprovesource">
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



</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>