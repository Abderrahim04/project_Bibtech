<?php
$conn = mysqli_connect("localhost", "votre_username", "votre_password", "bibliotheque_digitale");

if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}
?> 