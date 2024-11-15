<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bibliothèque Digitale - Accueil</title>
</head>
<body>
    <div class="header">
        <nav class="nav-center">>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Déconnexion</span>
            </a>
        </nav>
    </div>
</body>
</html> 
