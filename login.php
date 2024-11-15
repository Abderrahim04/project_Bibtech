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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
    background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?q=80');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    font-family: 'Times New Roman', serif;
    height: 100vh;
    margin: 0;
    padding: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-container {
    width: 90%;
    max-width: 400px;
    padding: 40px;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.8)),
        url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80');
    background-size: cover;
    background-position: center;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(8px);
    animation: fadeIn 0.8s ease-out;
}

h2 {
    text-align: center;
    color: #e6c992;
    margin-bottom: 30px;
    font-size: 28px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    animation: slideDown 0.5s ease-out;
}

.input-group {
    position: relative;
    margin-bottom: 25px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 15px 15px 15px 45px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    color: #fff;
    font-size: 16px;
    transition: all 0.3s ease;
    box-sizing: border-box;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

input[type="text"]:focus,
input[type="password"]:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
    transform: translateY(-2px);
}

.input-group::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    background-size: contain;
    background-repeat: no-repeat;
    z-index: 1;
    opacity: 0.7;
}

.input-group:nth-child(1)::before {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjZmZmZmZmIj48cGF0aCBkPSJNMTIgMTJjMi4yMSAwIDQtMS43OSA0LTRzLTEuNzktNC00LTQtNCAxLjc5LTQgNCAxLjc5IDQgNCA0em0wIDJjLTIuNjcgMC04IDEuMzQtOCA0djJoMTZ2LTJjMC0yLjY2LTUuMzMtNC04LTR6Ii8+PC9zdmc+');
}

.input-group:nth-child(2)::before {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSIjZmZmZmZmIj48cGF0aCBkPSJNMTggOGgtMVY2YzAtMi43Ni0yLjI0LTUtNS01UzcgMy4yNCA3IDZ2Mkg2Yy0xLjEgMC0yIC45LTIgMnYxMGMwIDEuMS45IDIgMiAyaDEyYzEuMSAwIDItLjkgMi0yVjEwYzAtMS4xLS45LTItMi0yem0tNiA5Yy0xLjEgMC0yLS45LTItMnMuOS0yIDItMiAyIC45IDIgMi0uOSAyLTIgMnptMy4xLTlIOC45VjZjMC0xLjcxIDEuMzktMy4xIDMuMS0zLjEgMS43MSAwIDMuMSAxLjM5IDMuMSAzLjF2MnoiLz48L3N2Zz4=');
}

.submit-btn {
    width: 100%;
    padding: 15px;
    background: linear-gradient(45deg, rgba(139, 69, 19, 0.6), rgba(160, 82, 45, 0.7));
    color: #fff;
    border: 1px solid rgba(139, 69, 19, 0.3);
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 2px;
    cursor: pointer;
    transition: all 0.4s ease;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    position: relative;
    overflow: hidden;
    margin-top: 10px;
}

.submit-btn:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(205, 133, 63, 0.3),
        transparent
    );
    transition: 0.5s;
}

.submit-btn:hover {
    background: linear-gradient(45deg, rgba(160, 82, 45, 0.7), rgba(205, 133, 63, 0.8));
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
    letter-spacing: 3px;
}

.submit-btn:hover:before {
    left: 100%;
}

.submit-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 5px rgba(139, 69, 19, 0.3);
}

/* Animation pour le bouton */
@keyframes buttonGlow {
    0% {
        box-shadow: 0 0 5px rgba(139, 69, 19, 0.3);
    }
    50% {
        box-shadow: 0 0 20px rgba(205, 133, 63, 0.5);
    }
    100% {
        box-shadow: 0 0 5px rgba(139, 69, 19, 0.3);
    }
}

/* Ajout d'une animation de pulsation subtile */
.submit-btn {
    animation: buttonGlow 2s infinite;
}

.error {
    background: rgba(220, 53, 69, 0.2);
    color: #ff9999;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
    animation: shake 0.5s ease-in-out;
}

.signup-link {
    text-align: center;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    animation: fadeIn 1.2s ease-out;
}

.signup-link a {
    color: #e6c992;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.signup-link a:hover {
    color: #ffd700;
    text-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
}

::placeholder {
    color: rgba(255, 255, 255, 0.7);
    font-style: italic;
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideDown {
    from { transform: translateY(-20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
    20%, 40%, 60%, 80% { transform: translateX(5px); }
}

/* Animation de la bordure au focus */
.input-group:focus-within::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(to right, #8b4513, #e6c992);
    animation: widthGrow 0.3s ease-out;
}

/* Animation de l'input au hover */
input[type="text"]:hover,
input[type="password"]:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.4);
}

/* Style pour montrer la validation */
input:valid {
    border-color: rgba(255, 255, 255, 0.5);
}

/* Animation du focus */
.input-group:focus-within input {
    background: rgba(255, 255, 255, 0.2);
}

.input-group:focus-within::before {
    opacity: 1;
}

@keyframes widthGrow {
    from { width: 0; }
    to { width: 100%; }
}

/* Style pour l'icône du thème */
.theme-toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    cursor: pointer;
    background: #000;  /* Noir */
    border: none;
    padding: 0;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.theme-toggle::before {
    content: '';
    position: absolute;
    width: 50%;
    height: 100%;
    background: #FFD700;  /* Jaune */
    left: 0;
    top: 0;
    transition: all 0.3s ease;
}

/* Animation de rotation */
@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

/* Animation pour le mode sombre vers clair */
.theme-toggle.rotating {
    animation: rotate 0.5s ease-in-out;
}

.light-theme .theme-toggle::before {
    left: 50%;
}

.theme-toggle:hover {
    transform: scale(1.1);
}

/* Style pour le mode clair */
.light-theme .login-container {
    background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
        url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80');
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.light-theme input[type="text"],
.light-theme input[type="password"] {
    background: rgba(0, 0, 0, 0.05);
    color: #333;
    border-color: rgba(0, 0, 0, 0.2);
}

.light-theme h2 {
    color: #8b4513;
}

.light-theme .signup-link a {
    color: #8b4513;
}

.light-theme ::placeholder {
    color: rgba(0, 0, 0, 0.6);
}
    </style>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()"></button>
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

    <script>
        function toggleTheme() {
            const toggle = document.querySelector('.theme-toggle');
            document.body.classList.toggle('light-theme');
            
            // Ajouter la classe pour l'animation
            toggle.classList.add('rotating');
            
            // Enlever la classe après l'animation
            setTimeout(() => {
                toggle.classList.remove('rotating');
            }, 500);

            // Sauvegarder le thème
            const isDark = !document.body.classList.contains('light-theme');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        // Charger le thème sauvegardé
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'light') {
                document.body.classList.add('light-theme');
            }
        });
    </script>
</body>
</html> 