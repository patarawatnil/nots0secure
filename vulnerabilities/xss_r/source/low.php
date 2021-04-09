<?php
// Is there any input?
if(isset($_POST['postarea']) ) {
    // Feedback for end user and vulnerable for example "<script>alert(document.cookie);</script>"
    echo '<p><b>Post</b> <br/>' . $_POST['postarea'] . '</p>';
}
?>