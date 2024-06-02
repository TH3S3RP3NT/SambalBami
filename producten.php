<?php

include 'config.php';

$soort = isset($_GET['soort']) ? $_GET['soort'] : '';

if ($soort != '') {
  $sql = "SELECT naam, soort, afbeelding, prijs FROM drugs WHERE soort = '$soort'";
} else {
  $sql = "SELECT naam, soort, afbeelding, prijs FROM drugs";
}

$result = mysqli_query($db, $sql);


if (mysqli_num_rows($result) > 0) {
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="SambalBami">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SambalBami | Producten</title>
    <link rel="stylesheet" href="./main/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="./main/assets/img/favicon.ico">
</head>

<body>
    <video id="background-video" autoplay loop muted>
        <source src="./main/assets/img/background.mp4" type="video/mp4">
    </video>
    <header>
        <h1 class="contact">SambalBami | Producten</h1>
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
            <form action="" method="get">
                <label for="soort">Filter op categorie:</label>
                <select name="soort" id="soort">
                    <option value="">All</option>
                    <?php
                $sql_categories = "SELECT DISTINCT soort FROM drugs";
                $result_categories = mysqli_query($db, $sql_categories);
                while ($row_categories = mysqli_fetch_assoc($result_categories)) {
                  echo "<option value='" . $row_categories["soort"] . "'";
                  if ($row_categories["soort"] == $soort) echo " selected";
                  echo ">" . $row_categories["soort"] . "</option>";
                }
                ?>
                </select>
                <button type="submit">Filter</button>
            </form>
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product">
                <h2>
                    <?php echo $row["naam"]; ?>
                </h2>
                <p>Categorie:
                    <?php echo $row["soort"]; ?>
                </p>
                <img src="<?php echo $row["afbeelding"]; ?>" alt="Product image">
                <p>Prijs:
                    <?php echo $row["prijs"]; ?>
                </p>
            </div>
            <?php
              }
            } else {
              echo "No products found.";
            }
            ?>
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
<?php } else {
  echo "No products found.";
}


mysqli_close($db);
?>