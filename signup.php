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
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style/signupe.css">
    <style>
        :root {
            --primary-color: #e6c992;
            --text-color: #fff;
            --bg-overlay: rgba(0, 0, 0, 0.85);
            --container-bg: rgba(0, 0, 0, 0.8);
            --input-bg: rgba(255, 255, 255, 0.1);
            --button-gradient: linear-gradient(45deg, rgba(139, 69, 19, 0.6), rgba(160, 82, 45, 0.7));
            --icon-filter: invert(1);
        }

        [data-theme="light"] .signup-container {
            background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80');
        }

        [data-theme="light"] .input-group input {
            background: rgba(0, 0, 0, 0.05);
            color: #333 !important;
        }

        [data-theme="light"] .input-group input::placeholder {
            color: #808080 !important;
        }

        body {
            background-image: linear-gradient(var(--bg-overlay), var(--bg-overlay)),
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

        .signup-container {
            width: 90%;
            max-width: 400px;
            padding: 40px;
            background-image: linear-gradient(var(--container-bg), var(--container-bg)),
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
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px 15px 15px 45px;
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: var(--text-color);
            font-size: 16px;
            transition: all 0.3s ease;
            box-sizing: border-box;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
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
            filter: var(--icon-filter);
        }

        .input-group:nth-child(1)::before {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iMjQiPjxwYXRoIGQ9Ik00ODAtNDAwcS02NiAwLTEwOC00MnQtNDItMTA4cTAtNjYgNDItMTA4dDEwOC00MnExNyAwIDMzLjUgMy41dDMxLjUgMTAuNXEtMjMgMjgtMzUuNSA2Mi41VDQ5Ny05NTVxMCAzNiAxMi41IDcwLjVUNTQ1LTgyMnEtMTUgNy0zMS41IDEwLjVUNDgwLTQwMFptMCA5MHEtMTQwIDAtMjQwLTEwMHQtMTAwLTI0MHEwLTE0MCAxMDAtMjQwdDI0MC0xMDBxMTQwIDAgMjQwIDEwMHQxMDAgMjQwcTAgMTQwLTEwMCAyNDB0LTI0MCAxMDBabTAtMzMwWiIvPjwvc3ZnPg==');
        }

        .input-group:nth-child(2)::before {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iMjQiPjxwYXRoIGQ9Ik00ODAtNDAwcS02NiAwLTEwOC00MnQtNDItMTA4cTAtNjYgNDItMTA4dDEwOC00MnExNyAwIDMzLjUgMy41dDMxLjUgMTAuNXEtMjMgMjgtMzUuNSA2Mi41VDQ5Ny05NTVxMCAzNiAxMi41IDcwLjVUNTQ1LTgyMnEtMTUgNy0zMS41IDEwLjVUNDgwLTQwMFptMCA5MHEtMTQwIDAtMjQwLTEwMHQtMTAwLTI0MHEwLTE0MCAxMDAtMjQwdDI0MC0xMDBxMTQwIDAgMjQwIDEwMHQxMDAgMjQwcTAgMTQwLTEwMCAyNDB0LTI0MCAxMDBabTAtMzMwWiIvPjwvc3ZnPg==');
        }

        .input-group:nth-child(3)::before {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iMjQiPjxwYXRoIGQ9Ik0xNjAtMTYwcS0zMyAwLTU2LjUtMjMuNVQ4MC0yNDB2LTQ4MHEwLTMzIDIzLjUtNTYuNVQxNjAtODAwaDY0MHEzMyAwIDU2LjUgMjMuNVQ4ODAtNzIwdjQ4MHEwIDMzLTIzLjUgNTYuNVQ4MDAtMTYwSDE2MFptMzIwLTIwMEwxNjAtNjQwdi00MGw0ODAgMzIwbDQ4MC0zMjB2NDBMNDgwLTQ0MFoiLz48L3N2Zz4=');
        }

        .input-group:nth-child(4)::before {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iMjQiPjxwYXRoIGQ9Ik00ODAtNDAwcS02NiAwLTEwOC00MnQtNDItMTA4cTAtNjYgNDItMTA4dDEwOC00MnExNyAwIDMzLjUgMy41dDMxLjUgMTAuNXEtMjMgMjgtMzUuNSA2Mi41VDQ5Ny05NTVxMCAzNiAxMi41IDcwLjVUNTQ1LTgyMnEtMTUgNy0zMS41IDEwLjVUNDgwLTQwMFptMCA5MHEtMTQwIDAtMjQwLTEwMHQtMTAwLTI0MHEwLTE0MCAxMDAtMjQwdDI0MC0xMDBxMTQwIDAgMjQwIDEwMHQxMDAgMjQwcTAgMTQwLTEwMCAyNDB0LTI0MCAxMDBabTAtMzMwWiIvPjwvc3ZnPg==');
        }

        .input-group:nth-child(5)::before {
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgLTk2MCA5NjAgOTYwIiB3aWR0aD0iMjQiPjxwYXRoIGQ9Ik0yNDAtMjAwcS0zMyAwLTU2LjUtMjMuNVQxNjAtMjgwdi00MDBxMC0zMyAyMy41LTU2LjVUMjQwLTc2MGg0MHYtODBxMC04MyA1OC41LTE0MS41VDQ4MC04NDBxODMgMCAxNDEuNSA1OC41VDY4MC04NDB2ODBoNDBxMzMgMCA1Ni41IDIzLjVUODAwLTY4MHY0MDBxMCAzMy0yMy41IDU2LjVUNzIwLTIwMEgyNDBabTAtODBoNDgwdi00MDBoLTQ4MHY0MDBabTI0MC0yMDBxMzMgMCA1Ni41LTIzLjVUNTYwLTU2MHEwLTMzLTIzLjUtNTYuNVQ0ODAtNjQwcS0zMyAwLTU2LjUgMjMuNVQ0MDAtNTYwcTAgMzMgMjMuNSA1Ni41VDQ4MC00ODBabS00MC00MDBoODB2LTgwcTAtMzMtMjMuNS01Ni41VDQ4MC03NjBxLTMzIDAtNTYuNSAyMy41VDQwMC02ODB2ODBaIi8+PC9zdmc+');
        }

        input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        input:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        ::placeholder {
            color: rgba(255, 255, 255, 0.7);
            font-style: italic;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .input-group {
            animation: slideIn 0.5s ease-out forwards;
        }

        .input-group:nth-child(1) { animation-delay: 0.1s; }
        .input-group:nth-child(2) { animation-delay: 0.2s; }
        .input-group:nth-child(3) { animation-delay: 0.3s; }
        .input-group:nth-child(4) { animation-delay: 0.4s; }
        .input-group:nth-child(5) { animation-delay: 0.5s; }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: var(--button-gradient);
            color: #fff;
            border: 1px solid rgba(139, 69, 19, 0.3);
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
        }

        .submit-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(205, 133, 63, 0.3), transparent);
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

        .login-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--primary-color) !important;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: #fff;
            text-shadow: 0 0 8px rgba(255, 215, 0, 0.4);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes buttonGlow {
            0% { box-shadow: 0 0 5px rgba(139, 69, 19, 0.3); }
            50% { box-shadow: 0 0 20px rgba(205, 133, 63, 0.5); }
            100% { box-shadow: 0 0 5px rgba(139, 69, 19, 0.3); }
        }

        .submit-btn {
            animation: buttonGlow 2s infinite;
        }

        /* Remplacer la section du theme-switch par ce nouveau code */

        .theme-switch {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .theme-switch input {
            display: none;
        }

        .theme-switch label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        /* Style spécifique pour l'icône */
        .theme-icon {
            width: 25px;
            height: 25px;
            position: relative;
        }

        .theme-icon::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to right,
                #FFD700 0%,
                #FFD700 50%,
                #1C1C1C 50%,
                #1C1C1C 100%
            );
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        /* Animation lors du changement */
        [data-theme="light"] .theme-icon::before {
            transform: rotate(180deg);
        }

        [data-theme="light"] input::placeholder {
            color: #808080 !important;
        }

        [data-theme="light"] .login-link a {
            color: #000 !important;
        }

        [data-theme="light"] .login-link a:hover {
            color: #333 !important;
        }

        /* Garder les styles du texte en mode sombre */
        .input-group input,
        .submit-btn,
        .login-link a,
        h2,
        ::placeholder {
            color: var(--text-color) !important;
        }
    </style>
</head>
<body>
    <div class="theme-switch">
        <input type="checkbox" id="theme-toggle">
        <label for="theme-toggle">
            <div class="theme-icon"></div>
        </label>
    </div>
    <div class="signup-container">
        <form method="POST" action="">
            <h2>Sign Up</h2>
            <div class="input-group">
                <input type="text" name="nom" placeholder="Last Name" required>
            </div>
            <div class="input-group">
                <input type="text" name="prenom" placeholder="First Name" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" name="submit" value="Sign Up" class="submit-btn">
            <div class="login-link">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </form>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const label = themeToggle.nextElementSibling;
        
        // Vérifie si un thème est déjà enregistré
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
            if (currentTheme === 'light') {
                themeToggle.checked = true;
            }
        }

        // Change le thème quand le switch est activé
        themeToggle.addEventListener('change', function() {
            label.classList.add('rotating');
            
            if (this.checked) {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }

            setTimeout(() => {
                label.classList.remove('rotating');
            }, 200);
        });
    </script>
</body>
</html> 