<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="SambalBami">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SambalBami | Startpagina</title>
    <link rel="stylesheet" href="./main/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./main/assets/img/favicon.ico">
</head>

<body>
    <video id="background-video" autoplay loop muted>
        <source src="./main/assets/img/background.mp4" type="video/mp4">
    </video>
    <header>
        <h1 class="contact">SambalBami | Home</h1>
        <div class="dropdown">
            <div class="select">
                <span class="selected">Menu</span>
                <div class="caret"></div>
            </div>
            <ul class="menu">
                <li class="active">Menu</li>
                <a class='ldropdown' href='index.php'>
                    <li>Home</li>
                </a>
                <a class="ldropdown" href="producten.php">
                    <li>Producten</li>
                </a>
                <?php if (isset($_SESSION['id']) && $_SESSION['username'] == true) {?>
                <a class="ldropdown" href="home.php">
                    <li>Mijn account</li>
                </a>
                <a class="ldropdown" href="logout.php">
                    <li>Uitloggen</li>
                </a>
                <?php } else {?>
                <a class="ldropdown" href="login.php">
                    <li>Inloggen</li>
                </a>
                <?php }?>
            </ul>
        </div>
    </header>
    <div id="wrapper">
        <main>
            <h1>Beste klant, welkom bij SambalBami!</h1>
            <p>Op dit moment is onze website nog niet helemaal voltooid, maar dat maakt niet uit.</p><br>
            <p>Geniet van onze website in zijn nog eerste versie!</p>
            <a href="signup.php"><button>Registreer</button></a>
            <a href="login.php"><button>Inloggen</button></a>
            <a href="producten.php"><button>Producten</button></a>
        </main>
    </div>
    <footer>
        <p>Copyright &copy;
            <script src='./main/assets/js/date.js'></script> | SambalBami
        </p>
    </footer>
    <script src='./main/assets/js/dropdown.js'></script>
</body>

</html>