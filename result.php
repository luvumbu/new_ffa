<?php
session_start();
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = $username;
$dbname = "all_ffa";
$club_nom = $_POST["club_nom"];
$nom_epreuve = $_POST["nom_epreuve"];
$users_nom_complet = $_POST["users_nom_complet"];
$search  = array("&", "'", "à", "À", "á", "Á", "â", "Â", "ã", "Ã", "ä", "Ä", "å", "Å", "æ", "Æ", "è", "È", "é", "É", "ê", "Ê", "ë", "Ë", "ì", "Ì", "í", "Í", "î", "Î", "ï", "Ï", "ò", "Ò", "ó", "Ó", "ô", "Ô", "õ", "Õ", "ö", "Ö", "ø", "Ø", "ù", "Ù", "ú", "Ú", "û", "Û", "ü", "Ü", "ñ", "Ñ", "ý", "Ý");
$replace = array('&amp', "&#039", "&agrave", "&Agrave", "&aacute", "&Aacute", "&acirc", "&Acirc", "&atilde", "&Atilde", "&auml", "&Auml", "&aring", "&Aring", "&aelig", "&AElig", "&egrave", "&Egrave", "&eacute", "&Eacute", "&ecirc", "&Ecirc", "&euml", "&Euml", "&igrave", "&Igrave", "&iacute", "&Iacute", "&icirc", "&Icirc", "&iuml", "&Iuml", "&ograve", "&Ograve", "&oacute", "&Oacute", "&ocirc", "&Ocirc", "&otilde", "&Otilde", "&ouml", "&Ouml", "&oslash", "&Oslash", "&ugrave", "&Ugrave", "&uacute", "&Uacute", "&ucirc", "&Ucirc", "&uuml", "&Uuml", "&ntilde", "&Ntilde", "&yacute", "&Yacute");
$club_nom = str_replace($search, $replace, $club_nom);
$nom_epreuve = str_replace($search, $replace, $nom_epreuve);
$users_nom_complet = str_replace($search, $replace, $users_nom_complet);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// premier select
$sql = 'SELECT * FROM `club` WHERE `club_nom`="' . $club_nom . '"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $club_id =            $row["club_id"];
    $club_nom =           $row["club_nom"];
    $club_region =        $row["club_region"];
    $club_departement =   $row["club_departement"];
    $club_add_date =      $row["club_add_date"];
  }
} else {
  echo "0 results";
}
// fin premier select 
$sql = 'SELECT * FROM `epreuve` WHERE `nom_epreuve`="' . $nom_epreuve . '"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $id_epreuve =                   $row["id_epreuve"];
    //$nom_epreuve
    $filtre_nom_epreuve =           $row["filtre_nom_epreuve"];
    $sex_epreuve =                  $row["sex_epreuve"];
    $add_epreuve =                  $row["add_epreuve"];
  }
} else {
  echo "0 results";
}
$sql = 'SELECT * FROM `users` WHERE `users_nom_complet`="' . $users_nom_complet . '"';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "Nom complet";
    $users_id =                   $row["users_id"];
    //$users_nom_complet=           $row["users_nom_complet"];  
    $users_nom =                  $row["users_nom"];
    $users_prenom =               $row["users_prenom"];
    $users_sex =                  $row["users_sex"];
    $users_naissance =            $row["users_naissance"];
    $users_naissance2 =           $row["users_naissance2"];
    $users_nationality =          $row["users_nationality"];
    $users_datte_add =            $row["users_datte_add"];

    echo "FIN";
  }
} else {
  echo "0 results";
}

$conn->close();

//$club_id =            $row["club_id"]; ok
//$club_nom =           $row["club_nom"];
//$club_region =        $row["club_region"];
//$club_departement =   $row["club_departement"];
// $club_add_date =      $row["club_add_date"];
// //$id_epreuve =                   $row["id_epreuve"]; ok
// //$nom_epreuve  ok
// $filtre_nom_epreuve =           $row["filtre_nom_epreuve"];
// //$sex_epreuve =                  $row["sex_epreuve"]; ok
// $add_epreuve =                  $row["add_epreuve"];

// //$users_id =                   $row["users_id"]; ok
// //$users_nom_complet=           $row["users_nom_complet"];  ok
// //$users_nom =                  $row["users_nom"]; ok
// //$users_prenom =               $row["users_prenom"]; ok
// $users_sex =                  $row["users_sex"];
// $users_naissance =            $row["users_naissance"];
// $users_naissance2 =           $row["users_naissance2"];
// $users_nationality =          $row["users_nationality"];
// $users_datte_add =            $row["users_datte_add"];



$result_id_user=$users_id;
$result_id_club = $club_id;
$result_id_epreuve=$id_epreuve ;
$result_users_nom_complet = $users_nom_complet;
$result_users_nom = $users_nom;
$result_users_prenom =$users_prenom;
$result_naissance_nom=$users_naissance;
$result_naissance_filtre = $users_naissance2;
$result_epreuve_nom= $nom_epreuve;
$result_filtre_epreuve_nom= $filtre_nom_epreuve;
$result_perf ;
$result_perf_2;
$result_perf_3 ; 
$result_sex =$sex_epreuve;
$result_perf_commentaire;
$result_club_nom =$club_nom;
$result_club_region = $club_region;
$result_club_departement=$club_departement;
$result_categoti ;
$result_personal_reccord;
$result_date_perf;
$result_date_add;













$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO result (result_id_user,result_id_club, result_id_epreuve,result_users_nom_complet,result_users_nom,result_users_prenom,result_naissance_nom,result_naissance_filtre,result_epreuve_nom,result_filtre_epreuve_nom,result_perf,result_perf_2,result_perf_3,result_sex,result_perf_commentaire,result_club_nom,result_club_region,result_club_departement,result_categoti,result_personal_reccord,result_date_perf)
VALUES ('$result_id_user','$result_id_club','$result_id_epreuve','$result_users_nom_complet','$result_users_nom','$result_users_prenom','$result_naissance_nom','$result_naissance_filtre','$result_epreuve_nom','$result_filtre_epreuve_nom','$result_perf','$result_perf_2','$result_perf_3','$result_sex','$result_perf_commentaire','$result_club_nom','$result_club_region','$result_club_departement','$result_categoti','$result_personal_reccord','$result_date_perf')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();