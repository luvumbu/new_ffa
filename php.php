<?php 
session_start();
header("Access-Control-Allow-Origin: *");
echo $_POST["club_nom"];
?>