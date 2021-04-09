<?php
// Is there any input?
if( isset( $_POST['postarea'] ) ) {
    // Get input and sanitize which make all html tags become text not something to render
    $name = htmlspecialchars( $_POST['postarea'] );
    // Feedback for end user
    echo "<p><b>Post</b> <br/>$name</p>";
}
?>