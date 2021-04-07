<?php

if( isset( $_POST['login'] ) ) {
    // Get username
    $user = $_POST[ 'username' ];
    //echo "$user <br/>";
    // Get password
    $pass = $_POST[ 'password' ];
    $pass = md5( $pass );
    //echo "$pass";

    
    // Get Database config
    include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
    $servername = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;

    // Check the database
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // query
        $stmt = $conn->prepare("SELECT * FROM users WHERE user = :usernane AND password = :password LIMIT 1;");
        $stmt->bindParam(':usernane', $user);
        $stmt->bindParam(':password', $pass);
        $stmt->execute();
        $data = $stmt->fetch();

        if($data){
            // login success
            echo "<p>Welcome <span class='fw-bold'>$user</span></p>";
        } else {
            // login fail
            echo "<p>Username and/or password incorrect.</p>";
        }

    } catch (PDOException $e) {
        // if exception happen
        echo "Error: " . $e->getMessage();
    }
    // close connection
    $conn = null;

}

?>