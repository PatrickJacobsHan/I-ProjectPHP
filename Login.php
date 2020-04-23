<?php
session_start();
require_once('Database.php');
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord     = $_POST['wachtwoord'];
$ingelogd       = $_POST['ingelogd'];

$sql = "select wachtwoord from Gebruiker where gebruikersnaam = ?";
$query = $dbh->prepare($sql);
$query->execute([$gebruikersnaam]);
$sqlwachtwoord = $query->fetch();
if(password_verify($wachtwoord,$sqlwachtwoord[0])) {
    $_SESSION['gebruikersnaam'] = $gebruikersnaam;
    //header("Location:../");
if ($ingelogd == "true") {
    //ik heb gekozen voor 4 jaar omdat dit ongeveer de gebruikersduur is van een laptop.
    setcookie('gebruikersnaam',$gebruikersnaam,time() + 126227704,"/");
}
}else{
    // header("Location:../");
}

