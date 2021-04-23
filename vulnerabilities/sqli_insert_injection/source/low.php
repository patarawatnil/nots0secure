<?php

if (isset($_POST['btnComment'])) {

    // Get input
    $message = trim($_POST['txtComment']);
    $name    = trim($_POST['txtName']);

    // Sanitize message input
    $message = stripslashes($message);
    $message = htmlspecialchars($message);

    // Sanitize name input
    $name = stripslashes($name);
    $name = htmlspecialchars($name);

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

        // insert into database
        $sql = "INSERT INTO guestbook ( name, comment) VALUES ( '$name, '$message' );";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // Feedback for the user

    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }

    $conn = null;
}

?>