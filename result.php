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




 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT MAX(`club_id`) FROM `club` WHERE 1';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $club_id= $row["MAX(`club_id`)"];
  }
} else {
  echo "0 results";
}

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT MAX(`id_epreuve`) FROM `epreuve` WHERE 1';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $id_epreuve= $row["MAX(`id_epreuve`)"];
  }
} else {
  echo "0 results";
}


$sql = 'SELECT MAX(`users_id`) FROM `users` WHERE 1';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $users_id= $row["MAX(`users_id`)"];
  }
} else {
  echo "0 results";
}
 




echo  $club_id.'--_';
echo  $id_epreuve.'--_';
echo  $users_id.'!';




// user information  

$sql = 'SELECT * FROM `users` WHERE `users_id`="'.$club_id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {  
    $users_nom_complet=$row["users_nom_complet"];
    $users_nom=$row["users_nom"];
    $users_prenom=$row["users_prenom"];
    $users_sex=$row["users_sex"];
    $users_naissance=$row["users_naissance"];
    $users_naissance2=$row["users_naissance2"];
    $users_nationality=$row["users_nationality"];
    $users_datte_add=$row["users_datte_add"];
  }
} else {
  echo "0 results";
}
// fin user informations

// club informations 

$sql = 'SELECT * FROM `club` WHERE `club_id`="'.$club_id.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

  $club_nom=$row["club_nom"];
  $club_region=$row["club_region"];
  $club_departement=$row["club_departement"];
  $club_add_date=$row["club_add_date"];

  }
} else {
  echo "0 results";
}

// fin club informations 

// epreuveinformations

$sql = 'SELECT * FROM `epreuve` WHERE `id_epreuve`="'.$id_epreuve.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $nom_epreuve=$row["nom_epreuve"];
  $filtre_nom_epreuve=$row["filtre_nom_epreuve"];
  $sex_epreuve=$row["sex_epreuve"];
  $add_epreuve=$row["add_epreuve"];
  }
} else {
  echo "0 results";
}
// fin epreuveinformations

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = 'SELECT * FROM `result` WHERE `result_id_user`="'.$users_id.'" ';
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo $row["result_id"];
//     echo "TRouvé";
//   }
// } else {

// 	$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// $sql = "INSERT INTO result (result_id_user,result_id_club,result_id_epreuve,result_nom_complet,result_users_nom,result_users_prenom,result_epreuve_nom,result_filtre,epreuve_nom)
// VALUES ('$users_id','$club_id','$id_epreuve','$users_nom_complet','$users_nom','$users_prenom','$nom_epreuve','filtre')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }  
// }
// $conn->close();
 
?>