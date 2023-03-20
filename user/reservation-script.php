<?php 
include("./dbConnection.php");
include("./session_config.php");


$id_adherent = $_SESSION['id_adherent'];

$id_ouvrage_selectione = $_GET['codeOuvrage'];


$enregistrement_reservation_request = "INSERT INTO `reservation` VALUES (NULL, '$id_adherent', '$id_ouvrage_selectione', current_timestamp());";
$enregistrement_reservation = $db_connection->prepare($enregistrement_reservation_request);
$enregistrement_reservation->execute();

header('Location: profil.php'); 


?>