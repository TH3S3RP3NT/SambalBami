<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="SambalBami">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SambalBami | Inloggen</title>
    <link rel="stylesheet" href="./main/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./main/assets/img/favicon.ico">
    <script type="text/javascript" src="./main/assets/js/showpassword.js"></script>
</head>

<body> <video id="background-video" autoplay loop muted <source src="./main/assets/img/background.mp4" type="video/mp4">
    </video>
    <header>
        <h1 class="contact">Inloggen bij SambalBami</h1>
    </header>
    <div id="wrapper">
        <main>
     <form action="login_check.php" method="post">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <label>Gebruikersnaam</label>
      <input type="text" name="uname" placeholder="Uw gebruikersnaam"><br>

      <label>Wachtwoord</label>
      <input type="password" id="wachtwoord" name="password" placeholder="Uw wachtwoord"><br>
        <label for="tonen">Wachtwoord tonen:</label>
        <input type="checkbox" id="tonen" name="tonen" onclick="showPassword()">
      <button type="submit">Inloggen</button>
          <a href="signup.php" class="ca">Creëer een account</a>
     </form>
        </div></main>
        <footer>
          <p>Copyright &copy;
            <script src='./main/assets/js/date.js'></script> | SambalBami
          </p>
        </footer>
</body>
</html>