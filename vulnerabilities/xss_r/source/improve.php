<?php
// Is there any input?
if( isset( $_POST['postarea'] ) ) {
    // Get input and sanitize which clear all html tags
    $name = htmlspecialchars( $_POST['postarea'] );
    // Feedback for end user
    echo "<p><b>Post</b> <br/>$name</p>";
}
?>