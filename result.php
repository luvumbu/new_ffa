<?php 
echo "result"; 
echo "? fin";
echo "--".$users_id;
echo "--".$id_epreuve;
echo "--".$club_id;



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `result` WHERE `result_id_epreuve`="'.$id_epreuve.'" AND `result_date_perf`="0000-00-00"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["result_id"];
  }
} else {



// 	$conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO result (result_id_user,result_id_club,result_id_epreuve,result_nom_complet,result_users_nom,result_users_prenom,result_epreuve_nom,result_perf,result_club_nom,result_ville_nom,result_categoti,result_personal_reccord,result_date_perf)
// VALUES ('$users_id','$club_id','$id_epreuve','a','b','c','d','e','f','g','h','i')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }
  
}
$conn->close();
?>