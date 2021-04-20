<?php
if (isset($_GET['Submit'])) {

    // Get input
    $userid = $_GET['userid'];

    if (is_numeric($userid)) {
        // Get Database config
        //include(WEB_PAGE_TO_ROOT . 'static/database-config.inc.php');
        $dbservername = DB_HOST;
        $dbusername = DB_USERNAME;
        $dbpassword = DB_PASSWORD;
        $dbname = DB_NAME;

        // Check database
        try {
            $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare statement but instead to replace within statement use binding parameter
            $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE user_id = :userid LIMIT 1");

            // binding parameter
            $stmt->bindParam(':userid', $userid);

            /* 
            if there is more than one parameter you can use more bindParam() to bind more parameter
            example
            $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            or you can bind within execute()
            $stmt->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email));
            */

            // Execute Statement
            $stmt->execute();

            // Get results
            //$data = $stmt->fetchAll();
            // you may use fetch() in order to get 1 result
            $data = $stmt->fetch();

            // Feedback for end user
            // make sure only 1 result is returned
            /* if (count($data) >= 1) {
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
            } */
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
    } else {
        echo "<div class='mt-3'>Invaild Input</div>";
    }
}
