<?php

if (isset($_POST['changepass'])) {
    // Get input
    $user = 'dummy';// can change 'dummy' into other user
    $pass_new  = $_POST['newpass'];
    //$pass_conf = $_POST['confirmnewpass'];

    // Do the passwords match?
    //if( $pass_new == $pass_conf ) { // New Password have been checked from client-side by jquery validate
    // They do!
    $pass_new = md5($pass_new);

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

        // Update the database
        $sql = "UPDATE users SET password = :password WHERE user = :user;";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        // Binding Parameter
        $stmt->bindParam(':password', $pass_new);
        $stmt->bindParam(':user', $user); 

        // execute the query
        $stmt->execute();

        // Feedback for the user
        echo "<div>Password Changed.</div>";
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }

    //}
    //else {
    // Issue with passwords matching
    //    echo "<div>Passwords did not match.</div>";
    //}
}
// if new password and confirm new password is match will change user's password.
?>