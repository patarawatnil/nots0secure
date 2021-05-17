<?php 

// Define WEB_PAGE_TO_ROOT
define('WEB_PAGE_TO_ROOT', '');
// set Title
$title = "NOTS0SECURE";
// Include Header
include(WEB_PAGE_TO_ROOT . 'static/layouts/header.php');

?>


<div class="container">
    <div class="text-center p-5">
    <img class="d-block mx-auto my-3" src="static/image/logo.png" width="72" height="72">
    <h1>NOTS0SECURE</h1>
    <hr/>
    <div class="mt-3">
    <p class="lead">
NOTS0SECURE is a vulnerable PHP/MySQL web application. It focus on responseive user interface and simple to explode the vulnerabilities in unsecure and more secure process. Furthermore, help web developers and who have interested in website sucurity to understand the processes of secureing web applications. 
    </p>
    </div>
    </div>
</div>

<?php 

// Include Footer
include(WEB_PAGE_TO_ROOT . 'static/layouts/footer.php');

?>