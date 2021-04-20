<?php
if (isset($_REQUEST['Submit'])) {

    // Get input
    $userid = $_REQUEST['userid'];

    // Get Database config
    include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
    $dbservername = DB_HOST;
    $dbusername = DB_USERNAME;
    $dbpassword = DB_PASSWORD;
    $dbname = DB_NAME;

    // Check database
    try {
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
    * There is vulnerable in prepare statement.
    * User able to view all of user data with input that replace within $userid
    * for example if user submit %' or '0'='0 in textbox it will make statement become to 
    * SELECT user_id, first_name, last_name FROM users WHERE user_id = '%' or '0'='0'
    * which return everything because condition is always true
    */
        $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE user_id = '$userid'");
        // Execute Statement
        $stmt->execute();

        // Get results
        $data = $stmt->fetch();

        // Feedback for end user
        if ($data) {
            ?>
            <div class='mt-3'>User ID exists in the database.</div>
            <?php
        } else {
            ?>
            <div class='mt-3'>User ID is MISSING from the database.</div>
            <?php
        }
    } catch (PDOException $e) {
        // if exception happen
        echo "Error: " . $e->getMessage();
    }
    // close connection
    $conn = null;
}
?>