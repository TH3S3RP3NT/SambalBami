<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="SambalBami">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SambalBami | Account</title>
    <link rel="stylesheet" href="./main/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./main/assets/img/favicon.ico">
    <script type="text/javascript" src="./main/assets/js/showpassword.js"></script>
</head>

<body> <video id="background-video" autoplay loop muted <source src="./main/assets/img/background.mp4" type="video/mp4">
    </video>
    <header>
        <h1 class="contact">Accountpagina</h1>
        <div class="dropdown">
            <div class="select">
                <span class="selected">Menu</span>
                <div class="caret"></div>
            </div>
            <ul class="menu">
                <li class="active">Menu</li>
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
            <h2>Hallo,
                <?php echo $_SESSION['name']; ?>
            </h2>
            <p>Welkom op uw accountpagina.</p>
            <a href="producten.php"><button>Producten</button></a>,
            <a href="logout.php"><button>Uitloggen</button></a>
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

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>