<?php
if (isset($_POST['login'])) {
    // get input
    $user = $_POST['username'];
    $user = stripslashes($user);

    $pass = $_POST['password'];
    $pass = stripslashes($pass);
    $pass = md5($pass);

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
        $sql  = "SELECT * FROM users WHERE user = :user AND password = :pass LIMIT 1;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $data = $stmt->fetch();
        if ($data) {    // Login Successful...
            echo "<p>Valid password for '{$user}'</p>";
        } else {
            // Login failed
            echo "<p>Wrong password for '{$user}'</p>";
        }
    } catch (PDOException $e) {
        // if exception happen
        echo "Error: " . $e->getMessage();
    }
}
?>