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
    <!-- Ajout Font Awesome et CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            /* Mode Clair */
            --bg-color: #F5F0EC;  /* خلفية بيضاء مايلة للبني */
            --text-color: #2C1810;  /* نص بني غامق */
            --nav-bg: #D7CCC8;  /* خلفية النافبار بلون بني فاتح */
            --nav-text: #2C1810;  /* نص بني غامق في النافبار */
            --dropdown-bg: #FFFFFF;  /* خلفية بيضاء للقائمة المنسدلة */
            --dropdown-text: #2C1810;  /* نص بني غامق في القائمة المنسدلة */
            --dropdown-hover: #E8E0DA;  /* هوفر بلون فاتح */
            --footer-bg: #D7CCC8;  /* خلفية الفوتر بلون بني فاتح */
            --footer-text: #2C1810;  /* نص بني غامق في الفوتر */
            --link-color: #2C1810;  /* لون الروابط */
            --border-color: #E0D6D1;  /* لون الحدود */
        }

        [data-theme="dark"] {
            /* Mode Sombre */
            --bg-color: #1A0F0F;  /* خلفية سوداء مايلة للبني */
            --text-color: #D7CCC8;  /* نص بني فاتح */
            --nav-bg: #1A0F0F;  /* خلفية النافبار */
            --nav-text: #F5F0EC;  /* نص فاتح في النافبار */
            --dropdown-bg: #2C1810;  /* خلفية داكنة للقائمة المنسدلة */
            --dropdown-text: #F5F0EC;  /* نص فاتح في القائمة المنسدلة */
            --dropdown-hover: #3E2723;  /* هوفر بلون غامق */
            --footer-bg: #1A0F0F;  /* خلفية الفوتر */
            --footer-text: #F5F0EC;  /* نص فاتح في الفوتر */
            --link-color: #F5F0EC;  /* لون الروابط */
            --border-color: #2C1810;  /* لون الحدود */
        }

        /* تطبيق الألوان على كل الصفحة */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        .navbar {
            background-color: var(--nav-bg);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-sizing: border-box;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
        }

        .logout-btn {
            background-color: var(--dark-brown);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .main-content {
            padding: 2rem;
            min-height: calc(100vh - 200px);
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66');
            background-size: cover;
            background-position: center;
            margin-top: 60px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 2rem;
        }

        .start-reading-btn {
            display: inline-block;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            background-color: var(--bg-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            border: 2px solid var(--text-color);
            margin-top: 2rem;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .start-reading-btn:hover {
            background-color: var(--text-color);
            color: var(--bg-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background-color: var(--footer-bg);
            color: var(--footer-text);
            padding: 20px 0;
            position: relative;
            width: 100%;
        }

        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-section {
            margin: 20px;
            min-width: 250px;
        }

        .footer-section h3 {
            color: var(--footer-text);
            margin-bottom: 15px;
        }

        .footer-section a {
            color: var(--footer-text);
            text-decoration: none;
            display: block;
            margin: 8px 0;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section a:hover {
            color: var(--dropdown-hover);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .social-links a {
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid var(--dark-brown);
        }

        /* تحسين المسافة بين الأيقونات والنص */
        .footer-section i {
            width: 20px;
            text-align: center;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a:hover {
            background-color: var(--dark-brown);
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
        }

        .logo i {
            color: var(--nav-text);
            font-size: 2rem;
        }

        .logo span {
            color: var(--nav-text);
            font-weight: bold;
            font-family: 'Georgia', serif;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            color: var(--nav-text) !important;
        }

        .nav-links a i {
            font-size: 1.1rem;
        }

        /* زيد تأثير للأيقونات */
        .nav-links a:hover i {
            transform: scale(1.1);
        }

        /* ستايل خاص للسلة */
        .nav-links a i.fa-shopping-cart {
            color: var(--light-brown);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-btn {
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--dropdown-bg);
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(44, 24, 16, 0.1);
            border-radius: 5px;
            top: 100%;
            right: 0;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a, 
        .dropdown-content button {
            color: var(--dropdown-text) !important;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-content a:hover, 
        .dropdown-content button:hover {
            background-color: var(--dropdown-hover);
        }

        /* تحسين شكل السهم */
        .fa-caret-down {
            margin-left: 5px;
        }

        /* إضافة خط فاصل بين العناصر */
        .dropdown-content a:not(:last-child),
        .dropdown-content button {
            border-bottom: 1px solid var(--border-color);
        }

        .logout-item {
            background-color: var(--dark-brown);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .logout-item:hover {
            background-color: var(--burnt-black);
        }

        /* ستايل خاص لزر الخروج في القائمة */
        .logout-item {
            color: #FF5252 !important;  /* لون أحمر للخروج */
        }

        .logout-item i {
            color: #FF5252 !important;
        }

        /* تأثير على زر تبديل الثيم */
        #theme-toggle {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            color: var(--dropdown-text) !important;
            padding: 12px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: inherit;
        }

        #theme-toggle:hover {
            background-color: var(--dropdown-hover);
        }

        #theme-toggle i {
            width: 20px;
        }

        /* تحسين مظهر الروابط في الوضع النهاري */
        .nav-links a {
            color: #F5F0EC;  /* لون فاتح للروابط */
        }

        .dropdown-content {
            background-color: #F5F0EC;  /* خلفية فاتحة للقائمة المنسدلة */
        }

        .dropdown-content a {
            color: #2C1810;  /* نص بني غامق */
        }

        .dropdown-content a:hover {
            background-color: #E8E0DA;  /* لون الهوفر فاتح */
        }

        /* تحسين مظهر Footer في الوضع النهاري */
        .footer-section a {
            color: #F5F0EC;
        }

        .footer-section a:hover {
            color: #FFFFFF;
        }

        /* ستايل خاص للقائمة المنسدلة في الوضع الليلي */
        [data-theme="dark"] .dropdown-content {
            background-color: var(--dropdown-bg);  /* خلفية داكنة */
            color: var(--dropdown-text);  /* نص فاتح */
        }

        /* Style spécifique pour le mode sombre */
        [data-theme="dark"] .start-reading-btn {
            background-color: #3E2723;
            color: white;
            border-color: transparent;
        }

        [data-theme="dark"] .start-reading-btn:hover {
            background-color: transparent;
            color: white;
            border-color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="#" class="logo">
            <i class="fas fa-book-open"></i>
            <span>BiblioDigitale</span>
        </a>
        <div class="nav-links">
            <a href="#"><i class="fas fa-home"></i> Accueil</a>
            <a href="#"><i class="fas fa-book"></i> Livres</a>
            <a href="#"><i class="fas fa-shopping-cart"></i> Panier</a>
            <div class="dropdown">
                <a href="#" class="dropdown-btn">
                    <i class="fas fa-user"></i> Profile <i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-content">
                    <a href="#"><i class="fas fa-user-edit"></i> Modifier Profile</a>
                    <button onclick="toggleTheme()" id="theme-toggle">
                        <i class="fas fa-moon"></i> 
                        <span>Mode Sombre</span>
                    </button>
                    <a href="#"><i class="fas fa-heart"></i> Favoris</a>
                    <a href="#"><i class="fas fa-cog"></i> Paramètres</a>
                    <a href="logout.php" class="logout-item">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <div class="hero-content">
            <h1>Découvrez notre collection de livres numériques</h1>
            <p>Plongez dans un monde de connaissances et d'aventures</p>
            <a href="#" class="start-reading-btn">
                <i class="fas fa-book-reader"></i> Commencer la lecture
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3><i class="fas fa-book-open"></i> BiblioDigitale</h3>
                <p>Votre bibliothèque numérique préférée</p>
            </div>
            
            <div class="footer-section">
                <h3><i class="fas fa-headset"></i> Support</h3>
                <a href="#"><i class="fas fa-envelope"></i> Contact</a>
                <a href="#"><i class="fas fa-question-circle"></i> FAQ</a>
                <a href="#"><i class="fas fa-info-circle"></i> Aide</a>
            </div>

            <div class="footer-section">
                <h3><i class="fas fa-share-alt"></i> Suivez-nous</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 BiblioDigitale. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        function toggleTheme() {
            // تحقق من الثيم الحالي
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            
            // تبديل الثيم
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            
            // تحديث الأيقونة والنص
            const icon = document.querySelector('#theme-toggle i');
            const text = document.querySelector('#theme-toggle span');
            
            if (newTheme === 'dark') {
                icon.className = 'fas fa-sun';
                text.textContent = 'Mode Clair';
            } else {
                icon.className = 'fas fa-moon';
                text.textContent = 'Mode Sombre';
            }
            
            // حفظ الاختيار
            localStorage.setItem('theme', newTheme);
        }

        // تطبيق الثيم المحفوظ عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
            
            const icon = document.querySelector('#theme-toggle i');
            const text = document.querySelector('#theme-toggle span');
            
            if (savedTheme === 'dark') {
                icon.className = 'fas fa-sun';
                text.textContent = 'Mode Clair';
            }
        });
    </script>
</body>
</html> 
