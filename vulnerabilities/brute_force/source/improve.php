<?php

if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {

    // Get input
    // Sanitise username input
    $user = $_POST['username'];
    $user = stripslashes($user);

    // Sanitise password input
    $pass = $_POST['password'];
    $pass = stripslashes($pass);
    $pass = md5($pass);

    // Get Database config
    //include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
    $dbservername = DB_HOST;
    $dbusername = DB_USERNAME;
    $dbpassword = DB_PASSWORD;
    $dbname = DB_NAME;

    // Set Default values
    $total_failed_login = 3;
    $lockout_time       = 60; // second
    $account_locked     = false;

    try {
        // make connection to database
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Check the database (Check user information)
        $data = $conn->prepare('SELECT failed_login, last_login FROM users WHERE user = :user LIMIT 1;');
        $data->bindParam(':user', $user);
        $data->execute();
        $row = $data->fetch(); // if empty will return false

        // Check to see if the user has been locked out.
        if ($row && ($row['failed_login'] >= $total_failed_login)) {
            // set default timezone
            //The list of valid identifiers is available in the List of Supported Timezones.
            //https://www.php.net/manual/en/timezones.php
            date_default_timezone_set('Asia/Bangkok');
            // get default timezone
            /* 
            $timezone = date_default_timezone_get();
             echo "The current server timezone is: " . $timezone;
              */
            // User locked out.  Note, using this method would allow for user enumeration!
            //echo "<pre><br />This account has been locked due to too many incorrect logins.</pre>";

            // Calculate when the user would be allowed to login again
            $last_login = strtotime($row['last_login']);
            $timeout    = $last_login + ($lockout_time);
            // $timeout    = $last_login + ($lockout_time);
            $timenow    = time();


            /* 
            print "The last login was: " . date("j,m,Y h:i:s", $last_login) . "<br />";
            print "The timenow is: " . date("j,m,Y h:i:s", $timenow) . "<br />";
            print "The timeout is: " . date("j,m,Y h:i:s", $timeout) . "<br />";
            */
            // Check to see if enough time has passed, if it hasn't locked the account
            if ($timenow < $timeout) {
                $account_locked = true;
                // print "The account is locked<br />";
            }
        }

        // Check the database (if username matches the password)
        $data = $conn->prepare('SELECT * FROM users WHERE user = :user AND password = :password LIMIT 1;');
        $data->bindParam(':user', $user);
        $data->bindParam(':password', $pass);
        $data->execute();
        $row = $data->fetch(); // if empty will return false
        // If its a valid login...
        if ($row && (!$account_locked)) {
            // Get users details
            $failed_login = $row['failed_login'];
            $last_login   = $row['last_login'];

            // Login successful
            echo "<p><span class='fw-bold'>Welcome</span> $user</p>";

            // Had the account been locked out since last login?
            if ($failed_login >= $total_failed_login) {
                echo "<p><span class='fw-bold'>Warning</span>: Someone might of been brute forcing your account.</p>";
                echo "<div>Number of login attempts: <em>{$failed_login}</em>.</div><div>Last login attempt was at: <em>${last_login}</em>.</div>";
            }

            // Reset bad login count
            $data = $conn->prepare('UPDATE users SET failed_login = "0" WHERE user = (:user) LIMIT 1;');
            $data->bindParam(':user', $user);
            $data->execute();
        } else {
            // Login failed
            if (!isset($_POST['skiptime'])) {
                sleep(rand(1, 2));
            }

            // Give the user some feedback
            echo "<p>Username and/or password incorrect.</p>";

            // Update bad login count
            $data = $conn->prepare('UPDATE users SET failed_login = (failed_login + 1) WHERE user = (:user) LIMIT 1;');
            $data->bindParam(':user', $user);
            $data->execute();

            // Tell the user how many chance they have to fail login (This may be vulnerable to reveal username)
            $data = $conn->prepare('SELECT failed_login FROM users WHERE user = :user LIMIT 1;');
            $data->bindParam(':user', $user);
            $data->execute();
            $row = $data->fetch();

            if ($row && $row['failed_login'] < $total_failed_login) {
                $login_chance = $total_failed_login - $row['failed_login'];
                echo "<p>Alternative, You have " . $login_chance . " more time(s) to login before the account will be locked </p>";
            } else {
                echo "<p>Alternative, The account has been locked because of too many failed logins
                , please try again in {$lockout_time} second.</p>";
            }
        }

        // Set the last login time
        $data = $conn->prepare('UPDATE users SET last_login = now() WHERE user = (:user) LIMIT 1;');
        $data->bindParam(':user', $user);
        $data->execute();
    } catch (PDOException $e) {
        // if exception happen
        echo "Error: " . $e->getMessage();
    }
    // close connection
    $conn = null;
}

// This may not prevent DDoS Attack