<?php

if (isset($_POST['changepass'])) {
    // Get input
    $user = "dummy"; // can change 'dummy' into other user
    $pass_curr = $_POST['currentpass'];
    $pass_new  = $_POST['newpass'];
    // $pass_conf = $_GET[ 'confirmnewpass' ];

    // Sanitise current password input
    $pass_curr = stripslashes($pass_curr);
    $pass_curr = md5($pass_curr);

    // Get Database config
    include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
    $dbservername = DB_HOST;
    $dbusername = DB_USERNAME;
    $dbpassword = DB_PASSWORD;
    $dbname = DB_NAME;

    try {
        // make connection
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check that the current password is correct
        $stmt = $conn->prepare('SELECT password FROM users WHERE user = :user AND password = :password LIMIT 1;');
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':password', $pass_curr);
        $stmt->execute();
        $data = $stmt->fetch();

        // Do both new passwords match and does the current password match the user?
        if ($data) { // New Password have been checked from client-side by jquery validate
            // It does!
            $pass_new = stripslashes($pass_new);
            $pass_new = md5($pass_new);

            // Update database with new password
            $stmt = $conn->prepare('UPDATE users SET password = :password WHERE user = :user;');
            $stmt->bindParam(':password', $pass_new);
            $stmt->bindParam(':user', $user);
            $stmt->execute();

            // Feedback for the user
            echo "<div>Password Changed.</div>";
        } else {
            // Issue with passwords matching
            echo "<div>Passwords did not match or current password incorrect.</div>";
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
?>