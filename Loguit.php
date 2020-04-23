<?php
session_start();
header("Location:../login.php");
if (isset($_SESSION['gebruikersnaam'])) {
    session_unset();
}
if (isset($_COOKIE['gebruikersnaam'])) {
    setcookie('gebruikersnaam', "", time() - 3600, "/");
}
?>