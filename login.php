<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "bibliotheque_digitale");

if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE username='$username' AND mot_de_passe='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('Location: accueil.php');
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="style/logine.css">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="">
            <h2>Connexion</h2>
            <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <div class="input-group">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            <input type="submit" name="submit" value="Se connecter" class="submit-btn">
            <div class="signup-link">
                <a href="signup.php">S'inscrire</a>
            </div>
        </form>
    </div>
</body>
</html> 