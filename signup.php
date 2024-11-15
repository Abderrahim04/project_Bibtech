<?php
$conn = mysqli_connect("localhost", "root", "", "bibliotheque_digitale");

if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe, username) 
            VALUES ('$nom', '$prenom', '$email', '$password', '$username')";
            
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Inscription réussie!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style/signupe.css">
</head>
<body>
    <div class="signup-container">
        <form method="POST" action="">
            <h2>Inscription</h2>
            <div class="input-group">
                <input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="input-group">
                <input type="text" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <input type="submit" name="submit" value="S'inscrire" class="submit-btn">
            <div class="login-link">
                Vous avez déjà un compte ? <a href="login.php">Connectez-vous ici</a>
            </div>
        </form>
    </div>
</body>
</html> 