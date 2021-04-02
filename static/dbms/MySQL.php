<?php
$databasename = "nots0secure";
$servername = "127.0.0.1";
$username = "root";
$password = "";

// make connection
try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully <br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage() . "<br>";
}
// TO-DO
// write setup/reset db
// create data base
try {
  $sql = "DROP DATABASE IF EXISTS $databasename";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database drop<br>";
} catch(PDOException $e) {
  echo $sql . "<br> " . $e->getMessage() . "<br>";
}

try {
  $sql = "CREATE DATABASE $databasename";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage() . "<br>";
}

// create table 'users'
try {
  $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE users (user_id int(6),first_name varchar(15),last_name varchar(15), user varchar(15), password varchar(32), last_login TIMESTAMP, failed_login INT(3), PRIMARY KEY (user_id));";
  $conn->exec($sql);
  echo "'users' table was created. <br>";
} catch(PDOException $e) {
 echo $sql . "<br>" . $e->getMessage() . "<br>";
}


// insert data into table
try{
	$sql = "INSERT INTO users VALUES
		('1','admin','admin','admin',MD5('password'), NOW(), '0'),
		('2','Gordon','Brown','gordonb',MD5('abc123'), NOW(), '0'),
		('3','Hack','Me','1337',MD5('charley'), NOW(), '0'),
		('4','Pablo','Picasso','pablo',MD5('letmein'), NOW(), '0'),
		('5','Bob','Smith','smithy',MD5('password'), NOW(), '0');";
	$conn->exec($sql);
	echo "Data inserted into 'users' table.";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage() . "<br>";
}


// close database
$conn = null;

?>

<!-- Go back to previous page -->
<script type="text/javascript">
	alert("");
    history.go(-1);
</script>