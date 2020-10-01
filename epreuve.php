<?php 

echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
 
 


 
$nom_epreuve= $_POST["nom_epreuve"];
$filtre_nom_epreuve= $_POST["filtre_nom_epreuve"];
$sex_epreuve= $_POST["sex_epreuve"];

echo $nom_epreuve ; 
echo $filtre_nom_epreuve ; 
echo $sex_epreuve ; 
// $nom_epreuve= $_POST["nom_epreuve"];
// $filtre_nom_epreuve= $_POST["filtre_nom_epreuve"];
// $sex_epreuve= $_POST["sex_epreuve"];
 






$search  = array("&","'","à","À","á","Á","â","Â","ã","Ã","ä","Ä","å","Å","æ","Æ","è","È","é","É","ê","Ê","ë","Ë","ì","Ì","í","Í","î","Î","ï","Ï","ò","Ò","ó","Ó","ô","Ô","õ","Õ","ö","Ö","ø","Ø","ù","Ù","ú","Ú","û","Û","ü","Ü","ñ","Ñ","ý","Ý");
$replace = array('&amp',"&#039","&agrave","&Agrave","&aacute","&Aacute","&acirc","&Acirc","&atilde","&Atilde","&auml","&Auml","&aring","&Aring","&aelig","&AElig","&egrave","&Egrave","&eacute","&Eacute","&ecirc","&Ecirc","&euml","&Euml","&igrave","&Igrave","&iacute","&Iacute","&icirc","&Icirc","&iuml","&Iuml","&ograve","&Ograve","&oacute","&Oacute","&ocirc","&Ocirc","&otilde","&Otilde","&ouml","&Ouml","&oslash","&Oslash","&ugrave","&Ugrave","&uacute","&Uacute","&ucirc","&Ucirc","&uuml","&Uuml","&ntilde","&Ntilde","&yacute","&Yacute");
$club_nom= str_replace($search, $replace, $filtre_nom_epreuve);
$club_nom= str_replace($search, $replace, $nom_epreuve);





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM `epreuve` WHERE `nom_epreuve`="'.$nom_epreuve.'"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id_epreuve= $row["id_epreuve"];
  }
} else {

// Create connection
$conn_insert = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_insert->connect_error) {
  die("Connection failed: " . $conn_insert->connect_error);
}

$sql_insert = "INSERT INTO epreuve (nom_epreuve, filtre_nom_epreuve,sex_epreuve)
VALUES ('$nom_epreuve', '$filtre_nom_epreuve', '$sex_epreuve')";
if ($conn_insert->query($sql_insert) === TRUE) { 
 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = 'SELECT * FROM `epreuve` WHERE `epreuve_nom`="'.$nom_epreuve.'"';
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			 
			 $id_epreuve= $row["id_epreuve"];		 
		}
	} else {
		echo "0 results";
	}

 
// fin select 

} else {
  echo "Error: " . $sql_insert . "<br>" . $conn_insert->error;
}
$conn_insert->close();
}
$conn->close();
// ici je vais recuperer le id du club qui est la variable $club_id
//$club_id 
// echo $id_epreuve;

include("user.php"); 
?>