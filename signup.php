<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="SambalBami">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SambalBami | Registreren</title>
    <link rel="stylesheet" href="./main/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./main/assets/img/favicon.ico">
    <script type="text/javascript" src="./main/assets/js/showpassword.js"></script>
</head>

<body> <video id="background-video" autoplay loop muted <source src="./main/assets/img/background.mp4" type="video/mp4">
    </video>
    <header>
        <h1 class="contact">Registreren bij SambalBami</h1>
    </header>
    <div id="wrapper">
        <main>
            <h2>Om te registreren, vul de volgende velden in:</h2>
            <form action="signup_check.php" method="post">
                <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                <p class="success">
                    <?php echo $_GET['success']; ?>
                </p>
                <?php } ?>

                <label>Naam</label>
                <?php if (isset($_GET['name'])) { ?>
                <input type="text" name="name" placeholder="Uw naam" value="<?php echo $_GET['name']; ?>"><br>
                <?php }else{ ?>
                <input type="text" name="name" placeholder="Uw naam"><br>
                <?php }?>

                <label>Gebruikersnaam</label>
                <?php if (isset($_GET['uname'])) { ?>
                <input type="text" name="uname" placeholder="Gebruikersnaam" value="<?php echo $_GET['uname']; ?>"><br>
                <?php }else{ ?>
                <input type="text" name="uname" placeholder="Gebruikersnaam"><br>
                <?php }?>

                <label>Email</label>
                <?php if (isset($_GET['email'])) { ?>
                <input type="email" name="email" placeholder="Uw email" value="<?php echo $_GET['email']; ?>"><br>
                <?php }else{ ?>
                <input type="email" name="email" placeholder="Uw email"><br>
                <?php }?>

                <label>Wachtwoord</label>
                <input type="password" name="password" placeholder="Wachtwoord"><br>

                <label>Wachtwoord bevestigen</label>
                <input type="password" name="re_password" placeholder="Voer opnieuw een wachtwoord in"><br>

                <button type="submit">Registreren</button>
                <a href="login.php" class="ca">Heeft u al een account?</a>
            </form>
    </div>
    <footer>
        <p>Copyright &copy;
            <script src='./main/assets/js/date.js'></script> | SambalBami
        </p>
    </footer>
    </main>
</body>

</html>