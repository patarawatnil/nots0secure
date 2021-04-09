<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Cross Site Request Forgery (CSRF) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>

<div class="container">
    <h1>Cross Site Request Forgery (CSRF)</h1>

    <p>
    <div>Default Account</div>
    <div>Username : dummy</div>
    <div>Password : dummy</div>
    </p>

    <div class="mt-3">
        <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#testcredentials" aria-expanded="false" aria-controls="testcredentials">
            Test Credentials
        </button>
    </div>
    <div class="collapse" id="testcredentials">
        <div class="mt-3">
            <div class="card card-body">
                <!-- Card Body-->
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
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="dummy" required>
                            </div>
                            <!-- Enter password -->
                            <div class="mt-3">
                                <label for="userid" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <!-- Submit -->
                            <div class="mt-3">
                                <input type="submit" name="login" value='Submit' class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End of Card to contain form -->
            </div>
            <!-- End of Card Body-->
        </div>
    </div>
</div>

<!-- View Result-->
<?php if (isset($_POST['login'])) { ?>

<div class="fw-bold mt-3">Result</div>

<?php
//Include Unsecure Code 
include('test_credentials.php');
?>
<?php } ?>
<!-- End of View Result-->

<div class="d-flex justify-content-center align-items-center">
    <!-- Card to contain form -->
    <div class="card mt-3">
        <div class="card-body">
            <!-- Form will submit to same page-->
            <form method="post" name="changepass" id="changepass">
                <h5 class="card-title">Change your dummy password</h5>
                <!-- Enter current password -->
                <div class="mt-3">
                    <label for="currentpass" class="form-label">Current password</label>
                    <input type="password" class="form-control" id="currentpass" name="currentpass" placeholder="Enter your current password">
                </div>
                <!-- Enter New password -->
                <div class="mt-3">
                    <label for="newpass" class="form-label">New password</label>
                    <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter new password">
                </div>
                <!-- Enter New password -->
                <div class="mt-3">
                    <label for="confirmnewpass" class="form-label">Confirm new password</label>
                    <input type="password" class="form-control" id="confirmnewpass" name="confirmnewpass" placeholder="Confirm new password">
                </div>
                <!-- Use Improve -->
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="useimprove" id="useimprove" name="useimprove">
                    <label class="form-check-label" for="useimprove">
                        Use Improve Source Code
                    </label>
                </div>
                <!-- Submit -->
                <div class="mt-3">
                    <input type="submit" name="changepass" value='Submit' class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Form -->

<!-- View Result-->
<?php if (isset($_POST['changepass']) && !isset($_POST['useimprove'])) { ?>

    <div class="fw-bold mt-3">Result</div>

    <?php
    //Include Unsecure Code 
    include('source/low.php')

    ?>
<?php } ?>
<!-- End of View Result-->

<!--View Improve Result-->
<?php if (isset($_POST['changepass']) && isset($_POST['useimprove'])) { ?>
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
                CSRF is an attack that forces an end user to execute unwanted actions on a web application in which they are currently authenticated. With a little help of social engineering (such as sending a link via email/chat), an attacker may force the users of a web application to execute actions of the attacker's choosing.
            </p>

            <p>
                A successful CSRF exploit can compromise end user data and operation in case of normal user. If the targeted end user is the administrator account, this can compromise the entire web application.
            </p>

            <p>
                Creating a targeted wordlists, which is generated towards the target, often gives the highest success
                rate. There are public tools out there that will create a dictionary based on a combination of company
                websites, personal social networks and other common information (such as birthdays or year of
                graduation).
            </p>

            <p>
                This attack may also be called "XSRF", similar to "Cross Site scripting (XSS)", and they are often used together.
            </p>
        </div>
    </div>
</div>
<!-- End of View Help -->

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
        <li><a href="https://owasp.org/www-community/attacks/csrf" target="_blank">Cross Site Request Forgery (CSRF) by OWASP</a></li>
        <li><a href="https://www.cgisecurity.com/csrf-faq.html" target="_blank">The Cross-Site Request Forgery (CSRF/XSRF) FAQ by CGISecurity</a></li>
        <li><a href="https://en.wikipedia.org/wiki/Cross-site_request_forgery" target="_blank">Cross-site request forgery by Wikipedia</a></li>
    </ul>
</div>

</div>

<?php
// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');
?>

<!--
jQuery + jQuery Validate
-->
<script src="<?php echo WEB_PAGE_TO_ROOT; ?>static/js/jquery.validate.min.js"></script>
<script>
    $().ready(function() {
        $("#changepass").validate({

            rules: {
                newpass: {
                    required: true,
                },
                confirmnewpass: {
                    required: true,
                    equalTo: "#newpass"
                }
            }
        });
    });
</script>