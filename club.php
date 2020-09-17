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


$club_id="";

$search  = array("&","'","à","À","á","Á","â","Â","ã","Ã","ä","Ä","å","Å","æ","Æ","è","È","é","É","ê","Ê","ë","Ë","ì","Ì","í","Í","î","Î","ï","Ï","ò","Ò","ó","Ó","ô","Ô","õ","Õ","ö","Ö","ø","Ø","ù","Ù","ú","Ú","û","Û","ü","Ü","ñ","Ñ","ý","Ý");
$replace = array('&amp',"&#039","&agrave","&Agrave","&aacute","&Aacute","&acirc","&Acirc","&atilde","&Atilde","&auml","&Auml","&aring","&Aring","&aelig","&AElig","&egrave","&Egrave","&eacute","&Eacute","&ecirc","&Ecirc","&euml","&Euml","&igrave","&Igrave","&iacute","&Iacute","&icirc","&Icirc","&iuml","&Iuml","&ograve","&Ograve","&oacute","&Oacute","&ocirc","&Ocirc","&otilde","&Otilde","&ouml","&Ouml","&oslash","&Oslash","&ugrave","&Ugrave","&uacute","&Uacute","&ucirc","&Ucirc","&uuml","&Uuml","&ntilde","&Ntilde","&yacute","&Yacute");
$club_nom= str_replace($search, $replace, $club_nom);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql ='SELECT * FROM `club` WHERE `club_nom`="'.$club_nom.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
		$club_id= $row["club_id"];
  }
} else {


// isertion des donnne si elle nexiste pas dans la BDD  #1 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO club (club_nom,club_region,club_departement)
VALUES ('$club_nom','$club_region','$club_departement')";

if ($conn->query($sql) === TRUE) {

	
	echo "New record created successfully";
	
	// debut de la condition #1  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// Create connection
 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `club` WHERE `club_nom` ="'.$club_nom.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $club_id= $row["club_id"];
  }
} else {
 
}



	// fin de la condition  #1    !!!!!!!!!!!!!!!!!!!!
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// fin de linsertio, des donne dans la bdd  #1 
}
$conn->close();
include("epreuve.php");



?>