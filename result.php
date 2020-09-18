<?php 
session_start();
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = $username;
$dbname = "all_ffa";




// $servername = "localhost";
// $username = "u481158665_all_ffa3";
// $password = "v3p9r3e@59A";
// $dbname = "u481158665_all_ffa3";







$users_id=                $_SESSION["users_id"];          
$club_nom=                $_SESSION["club_nom"];            
$club_region=             $_SESSION["club_region"];          
$club_departement=        $_SESSION["club_departement"];     

$users_nom_complet =      $_SESSION["users_nom_complet"];
$users_nom =              $_SESSION["users_nom"];
$users_prenom =           $_SESSION["users_prenom"];
$users_sex =              $_SESSION["users_sex"];
$users_naissance =        $_SESSION["users_naissance"];
$users_nationality =      $_SESSION["users_nationality"];
$club_id=                 $_SESSION["club_id"];
$id_epreuve=              $_SESSION["id_epreuve"];
$nom_epreuve=             $_SESSION["nom_epreuve"];



echo $club_id;
echo $users_id;
echo $club_nom;
echo $club_region;
echo $club_departement;
echo $users_nom_complet;
echo $users_nom;
echo $users_prenom;
echo $users_sex;
echo $users_naissance;
echo $users_nationality;
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `result` WHERE `result_id_user`="'.$users_id.'" ';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["result_id"];
    echo "TRouvé";
  }
} else {

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO result (result_id_user,result_id_club,result_id_epreuve,result_nom_complet,result_users_nom,result_users_prenom,result_epreuve_nom,result_filtre,epreuve_nom)
VALUES ('$users_id','$club_id','$id_epreuve','$users_nom_complet','$users_nom','$users_prenom','$nom_epreuve','filtre')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
  
}
$conn->close();



 
?>