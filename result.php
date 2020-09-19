<?php 
session_start();
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = $username;
$dbname = "all_ffa";


$club_nom=$_POST["club_nom"];
$nom_epreuve=$_POST["nom_epreuve"];
$users_nom_complet= $_POST["users_nom_complet"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// premier select
$sql = 'SELECT * FROM `club` WHERE `club_nom`="'.$club_nom.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 $club_id=            $row["club_id"];
 $club_nom=           $row["club_nom"];
 $club_region=        $row["club_region"];
 $club_departement=   $row["club_departement"];
 $club_add_date=      $row["club_add_date"];
  }
} else {
  echo "0 results";
}
// fin premier select 



$sql = 'SELECT * FROM `epreuve` WHERE `nom_epreuve`="'.$nom_epreuve.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 echo "epreuves";
  }
} else {
  echo "0 results";
}


$conn->close();
 

?>