<?php
// Is there any input?
if( isset( $_POST['postarea'] ) ) {
    // Get input and sanitize
    $name = htmlspecialchars( $_POST['postarea'] );
    // Feedback for end user
    echo "<p><b>Post</b> <br/>$name</p>";
}
?>