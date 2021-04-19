<?php

include('../database-config.inc.php');
$dbservername = DB_HOST;
$dbusername = DB_USERNAME;
$dbpassword = DB_PASSWORD;
$databasename = DB_NAME;

$alert_text = "";
// make connection
try {
  $conn = new PDO("mysql:host=$dbservername", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $alert_text .= "Connected successfully \n";
} catch (PDOException $e) {
  $alert_text = "Connection failed : " . $e->getMessage() . "\n";
  exit($alert_text. "<br/>Please check that MySQL is running or database-config.inc.php has correct configuration to connect database");
}

// write setup/reset db
// create data base
try {
  $sql = "DROP DATABASE IF EXISTS $databasename";
  // use exec() because no results are returned
  $conn->exec($sql);
  $alert_text .= "Database drop \n";
} catch (PDOException $e) {
  $alert_text = "Database drop failed : " . $e->getMessage() . "\n";
  exit($alert_text);
}

try {
  $sql = "CREATE DATABASE $databasename";
  // use exec() because no results are returned
  $conn->exec($sql);
  $alert_text .= "Database created successfully \n";
} catch (PDOException $e) {
  $alert_text = "Database created failed : " . $e->getMessage() . "\n";
  exit($alert_text);
}

// create table 'users'
try {
  $conn = new PDO("mysql:host=$dbservername;dbname=$databasename", $dbusername, $dbpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE users (user_id int(6),first_name varchar(15),last_name varchar(15), user varchar(15), password varchar(32), last_login TIMESTAMP, failed_login INT(3), PRIMARY KEY (user_id));";
  $conn->exec($sql);
  $alert_text .= "'users' table was created. \n";
} catch (PDOException $e) {
  $alert_text = "Unable to create 'users' table : " . $e->getMessage() . "\n";
  exit($alert_text);
}


// insert data into table
try {
  $sql = "INSERT INTO users VALUES
		('1','admin','admin','admin',MD5('password'), NOW(), '0'),
		('2','Gordon','Brown','gordonb',MD5('abc123'), NOW(), '0'),
		('3','Hack','Me','1337',MD5('charley'), NOW(), '0'),
		('4','Pablo','Picasso','pablo',MD5('letmein'), NOW(), '0'),
		('5','Bob','Smith','smithy',MD5('password'), NOW(), '0'),
    ('6','i','am','dummy',MD5('1234'),NOW(),'0');";
  $conn->exec($sql);
  $alert_text .= "Data inserted into 'users' table. \n";
} catch (PDOException $e) {
  $alert_text = "Unable to insert data into 'users' table : " . $e->getMessage() . "\n";
  exit($alert_text );
}

// create table 'guestbook'
try {
  $sql = "CREATE TABLE guestbook (comment_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, comment varchar(300), name varchar(100), PRIMARY KEY (comment_id));";
  $conn->exec($sql);
  $alert_text .= "'guestbook' table was created. \n";
} catch (PDOException $e) {
  $alert_text = "Unable to create 'guestbook' table : : " . $e->getMessage() . "\n";
  exit($alert_text );
}

// Insert data into 'guestbook'
try {
  $sql = "INSERT INTO guestbook VALUES ('1','This is a test comment.','test');";
  $conn->exec($sql);
  $alert_text .= "Data inserted into 'guestbook' table. \n \n";
} catch (PDOException $e) {
  $alert_text = "Unable to insert data into 'guestbook' table : : " . $e->getMessage() . "\n";
  exit($alert_text );
}



// close database
$conn = null;

$alert_text .= "Click 'OK' to go back"
// echo $alert_text;
?>

<!-- Alert and Go back to previous page -->
<script type="text/javascript">
  // passing php string in to javascript string
  var text = <?php echo json_encode($alert_text); ?>;
  alert(text);
  history.go(-1);
</script>