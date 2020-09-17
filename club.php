<?php 
session_start();
header("Access-Control-Allow-Origin: *");
 
$servername = "localhost";
$username = "root";
$password = $username;
$dbname = "all_ffa";
$club_nom= $_POST["club_nom"];
$club_region= $_POST["club_region"];
$club_departement= $_POST["club_departement"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `club` WHERE `club_nom`="'.$club_nom.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $club_id= $row["club_id"];
  }
} else {

// Create connection
$conn_insert = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_insert->connect_error) {
  die("Connection failed: " . $conn_insert->connect_error);
}

$sql_insert = "INSERT INTO club (club_nom, club_region,club_departement)
VALUES ('$club_nom', '$club_region', '$club_departement')";
if ($conn_insert->query($sql_insert) === TRUE) { 
 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = 'SELECT * FROM `club` WHERE `club_nom`="'.$club_nom.'"';
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
	   	$club_id= $row["club_id"];		 
		}
	} else {
		echo "0 results";
	}

echo "test error";
// fin select 

} else {
  echo "Error: " . $sql_insert . "<br>" . $conn_insert->error;
}
$conn_insert->close();
}
$conn->close();
// ici je vais recuperer le id du club qui est la variable $club_id
//$club_id 
$_SESSION["club_id"] = $club_id;
?>