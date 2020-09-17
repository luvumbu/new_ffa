<?php

$users_nom_complet =        $_POST["users_nom_complet"];
$users_nom =                $_POST["users_nom"];
$users_prenom =              $_POST["users_prenom"];
$users_sex =                $_POST["users_sex"];
$users_naissance =          $_POST["users_naissance"];
$users_nationality =        $_POST["users_nationality"];


$users_naissance2 = $users_naissance;






$search  = array("&", "'", "à", "À", "á", "Á", "â", "Â", "ã", "Ã", "ä", "Ä", "å", "Å", "æ", "Æ", "è", "È", "é", "É", "ê", "Ê", "ë", "Ë", "ì", "Ì", "í", "Í", "î", "Î", "ï", "Ï", "ò", "Ò", "ó", "Ó", "ô", "Ô", "õ", "Õ", "ö", "Ö", "ø", "Ø", "ù", "Ù", "ú", "Ú", "û", "Û", "ü", "Ü", "ñ", "Ñ", "ý", "Ý");
$replace = array('&amp', "&#039", "&agrave", "&Agrave", "&aacute", "&Aacute", "&acirc", "&Acirc", "&atilde", "&Atilde", "&auml", "&Auml", "&aring", "&Aring", "&aelig", "&AElig", "&egrave", "&Egrave", "&eacute", "&Eacute", "&ecirc", "&Ecirc", "&euml", "&Euml", "&igrave", "&Igrave", "&iacute", "&Iacute", "&icirc", "&Icirc", "&iuml", "&Iuml", "&ograve", "&Ograve", "&oacute", "&Oacute", "&ocirc", "&Ocirc", "&otilde", "&Otilde", "&ouml", "&Ouml", "&oslash", "&Oslash", "&ugrave", "&Ugrave", "&uacute", "&Uacute", "&ucirc", "&Ucirc", "&uuml", "&Uuml", "&ntilde", "&Ntilde", "&yacute", "&Yacute");

$users_nom = str_replace($search, $replace, $users_nom);
$users_prenom = str_replace($search, $replace, $users_prenom);
$users_nom_complet = str_replace($search, $replace, $users_nom_complet);


if ($users_naissance > 40) {
  $users_naissance = $users_naissance + 1900;
} else {
  $users_naissance = $users_naissance + 2000;
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM users WHERE `users_nom` LIKE "' . $users_nom . '%"  AND `users_naissance`="' . $users_naissance . '%"';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo $row["users_nom_complet"];

    $users_id  = $row["users_id"];
  }
} else {

  // si lutilisateur nexisyte pas lajouter


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO users (users_nom_complet, users_nom, users_prenom,users_sex,users_naissance,users_naissance2,users_nationality)
VALUES ('$users_nom_complet', '$users_nom', '$users_prenom','$users_sex','$users_naissance','$users_naissance2','$users_nationality')";

  if ($conn->query($sql) === TRUE) {



    echo "New record created successfully";

    // donne le id le l'utilisateur entrée 

















    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'SELECT * FROM users WHERE `users_nom` LIKE "' . $users_nom . '%"  AND `users_naissance`="' . $users_naissance . '%"';

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $users_id = $row["users_id"];
      }
    } else {
      echo "0 results";
    }



















    // fin de Lid de l'utilisateur 








  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



  // fin de lajout 



}
$conn->close();
include("result.php");
