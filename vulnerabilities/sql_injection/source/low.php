<?php
if (isset($_REQUEST['Submit'])) {

    // Get input
    $userid = $_REQUEST['userid'];

    // Get Database config
    include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
    $servername = DB_HOST;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_NAME;

    // Check database
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
    * There is vulnerable in prepare statement.
    * User able to view all of user data with input that replace within $userid
    * for example if user submit %' or '0'='0 in textbox it will make statement become to 
    * SELECT user_id, first_name, last_name FROM users WHERE user_id = '%' or '0'='0'
    * which return everything because condition is always true
    */
        $stmt = $conn->prepare("SELECT user_id, first_name, last_name FROM users WHERE user_id = '$userid'");
        // Execute Statement
        $stmt->execute();

        // Get results
        $data = $stmt->fetchAll();

        // Feedback for end user
        if (count($data) >= 1) {
            foreach ($data as $row) {
                echo "<div class='mt-3'>\n";
                // Get values
                echo "User ID : " . $userid . "<br />\n";
                echo "First Name : " . $row['first_name'] . "<br />\n";
                echo "Last Name : " . $row['last_name'] . "\n";
                echo "</div>\n";
            }
        } else {
            echo "<div class='mt-3'>This User ID is Not Found</div>";
        }
    } catch (PDOException $e) {
        // if exception happen
        echo "Error: " . $e->getMessage();
    }
    // close connection
    $conn = null;
}
?>