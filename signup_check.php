<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'] ?? '';
    $pass = $_POST['password'] ?? '';
    $re_pass = $_POST['re_password'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($uname);
    $pass = validate($pass);
    $re_pass = validate($re_pass);
    $name = validate($name);
    $email = validate($email);

    $user_data = 'uname=' . $uname . '&name=' . $name . '&email=' . $email;

    $errors = [];

    if (empty($uname)) {
        $errors[] = 'Gebruikersnaam is verplicht';
    }

    if (empty($pass)) {
        $errors[] = 'Wachtwoord is verplicht';
    }

    if (empty($re_pass)) {
        $errors[] = 'U moet uw wachtwoord bevestigen';
    }

    if (empty($name)) {
        $errors[] = 'Naam is verplicht';
    }

    if ($pass !== $re_pass) {
        $errors[] = 'De ingevulde wachtwoorden komen niet overeen';
    }

    if (!empty($errors)) {
        header("Location: signup.php?error=" . urlencode(implode(', ', $errors)) . "&$user_data");
        exit();
    }

  $pass = md5($pass);

    $sql = "SELECT * FROM users WHERE username=? ";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: signup.php?error=Deze gebruikersnaam is niet beschikbaar&$user_data");
        exit();
    } else {
        $sql2 = "INSERT INTO users(username, password, name, email) VALUES(?,?,?,?)";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bind_param("ssss", $uname, $pass, $name, $email);
        if ($stmt2->execute()) {
            header("Location: signup.php?success=Uw account is succesvol aangemaakt");
            exit();
        } else {
            header("Location: signup.php?error=Unknown error has occurred&$user_data");
            exit();
        }
    }
} else {
    header("Location: signup.php");
    exit();
}