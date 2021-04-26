<?php 

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "Command Injection - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <h1>Command Injection</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="post" name="ping">
                    <h5 class="card-title">Ping a device</h5>
                    <!-- Enter name -->
                    <div class="mt-3">
                        <label for="ip" class="form-label">IP Address</label>
                        <input type="text" class="form-control" id="ip" name="ip" placeholder="Enter an IP address" required>
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
                        <input type="submit" name="Submit" value='Submit' class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

    <!-- Use Source-->
    <?php if (!isset($_POST['useimprove'])) {
        //Include Unsecure Code 
        include('source/low.php');
    } else{
        //Include Improve Code 
        include('source/improve.php');
    }?>
    <!-- End of Source-->

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
                The purpose of the command injection attack is to inject and execute commands specified by the attacker in the vulnerable application. In situation like this, the application, which executes unwanted system commands, is like a pseudo system shell, and the attacker may use it as any authorized system user. However, commands are executed with the same privileges and environment as the web service has.
                </p>

                <p>
                Command injection attacks are possible in most cases because of lack of correct input data validation, which can be manipulated by the attacker (forms, cookies, HTTP headers etc.).
                </p>

                <p>
                The syntax and commands may differ between the Operating Systems (OS), such as Linux and Windows, depending on their desired actions.
                </p>

                <p>This attack may also be called "Remote Command Execution (RCE)".</p>
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
            <li><a href="https://ss64.com/bash/" target="_blank">An A-Z Index of the Linux command line:</a></li>
            <li><a href="https://ss64.com/nt/" target="_blank">An A-Z Index of Windows CMD commands</a></li>
            <li><a href="https://owasp.org/www-community/attacks/Command_Injection" target="_blank">Command Injection by OWASP</a></li>
        </ul>
    </div>

</div>

<?php 

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>