<?php
session_start();
include "config.php";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname) || empty($pass)) {
        header("Location: login.php?error=Alle velden zijn verplicht");
        exit();
    }


    $hashed_pass = md5($pass);


    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$hashed_pass'";
    $result = mysqli_query($db, $sql);


    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['username'] === $uname && $row['password'] === $hashed_pass) {
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];


            header("Location: home.php");
            exit();
        }
    }

    
    header("Location: login.php?error=Onjuiste gebruikersnaam of wachtwoord");
    exit();

} else {

    header("Location: login.php");
    exit();
}