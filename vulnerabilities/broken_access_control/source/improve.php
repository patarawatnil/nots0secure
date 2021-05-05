<?php
if (isset($_GET['userid'])) {
    // Get username
    $userid = $_GET['userid'];

    // In this case will define user that login
    $_SESSION['login'] = 6;
    // To Check that input and session have same value.
    if ($_SESSION['login'] == $userid) {


        // Get Database config
        //include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
        $dbservername = DB_HOST;
        $dbusername = DB_USERNAME;
        $dbpassword = DB_PASSWORD;
        $dbname = DB_NAME;

        // Check the database
        try {
            $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // query
            $stmt = $conn->prepare("SELECT first_name, last_name, user FROM users WHERE user_id = :userid LIMIT 1;");
            $stmt->bindParam(':userid', $userid);
            $stmt->execute();
            $data = $stmt->fetch();

            if ($data) {
?>
                <div class="mt-3">
                    <div>Username : <?php echo $data['user']; ?></div>
                    <div>First Name : <?php echo $data['first_name']; ?></div>
                    <div>Last Name : <?php echo $data['last_name']; ?></div>
                </div>
<?php
            }
        } catch (PDOException $e) {
            // if exception happen
            echo "Error : " . $e->getMessage();
        }
        // close connection
        $conn = null;
    } else {
        echo "<div class='mt-3'>You can not view other user profile.</div>";
    }
}
?>