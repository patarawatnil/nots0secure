<?php

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '../../');
// set Title
$title = "DOM Based Cross Site Scripting (XSS) - NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

# For the impossible level, don't decode the querystring
$decodeURI = "decodeURI";
if (isset($_GET['useimprove'])) {
    $decodeURI = "";
}
?>

<div class="container">
    <h1>DOM Based Cross Site Scripting (XSS)</h1>

    <!-- Card to contain form -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form will submit to same page-->
                <form method="get" name="xss">
                    <h5 class="card-title">Please choose a language</h5>
                    <!-- Enter language -->
                    <div class="mt-3">
                        <select name="default" class="form-select">
                            <script>
                                if (document.location.href.indexOf("default=") >= 0) {
                                    var lang = document.location.href.substring(document.location.href.indexOf("default=") + 8);
                                    document.write("<option value='" + lang + "'>" + <?php echo $decodeURI ?>(lang) /* decodeURI(lang) */ + "</option>");
                                    document.write("<option value='' disabled='disabled'>----</option>");
                                }

                                document.write("<option value='English'>English</option>");
                                document.write("<option value='French'>French</option>");
                                document.write("<option value='Spanish'>Spanish</option>");
                                document.write("<option value='German'>German</option>");
                            </script>
                        </select>
                    </div>
                    <!-- Use Improve -->
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="useimprove" id="useimprove" name="useimprove">
                        <label class="form-check-label" for="useimprove">
                            Use Improve Client Side
                        </label>
                        <div id="useimprovehelp" class="form-text">If check will use improve</div>
                    </div>
                    <!-- Submit -->
                    <div class="mt-3">
                        <input type="submit" value="Select" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Form -->

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
                    DOM Based XSS is a special case of reflected where the JavaScript is hidden in the URL and pulled out by JavaScript in the page while it is rendering rather than being embedded in the page when it is served. This can make it stealthier than other attacks and WAFs or other protections which are reading the page body do not see any malicious content.
                </p>
            </div>
        </div>
    </div>
    <!-- End of View Help -->

    <!-- View Source -->
    <div class="mt-3">
    <span>This vulnerability has been handled on the client side</span>
    </div>

    <!-- More Info -->
<div class="mt-3">
    <h2>More Infomation</h2>
    <ul>
        <li><a href="https://owasp.org/www-community/attacks/xss/" target="_blank">Cross Site Scripting (XSS) by OWASP</a></li>
        <li><a href="https://owasp.org/www-community/attacks/DOM_Based_XSS" target="_blank">DOM Based XSS by OWASP</a></li>
        <li><a href="https://www.acunetix.com/blog/articles/dom-xss-explained/" target="_blank">DOM XSS: An Explanation of DOM-based Cross-site Scripting by Tomasz Andrzej Nidecki</a></li>
    </ul>
</div>


</div>

<?php

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>