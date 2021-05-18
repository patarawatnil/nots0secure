<?php

// The page we wish to display
$file = $_GET[ 'web' ];
$found = true;
// Only allow some website
if( $file != "https://www.york.ac.uk/teaching/cws/wws/webpage1.html" && $file != "http://wttr.in/") {
    // This isn't the page we want!
    echo "<div>ERROR: Unable Access</div>";
    $found = false;
}

?>