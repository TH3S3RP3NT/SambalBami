<?php
    //Om met de database te verbinden moet je deze informatie invoeren in MySQL Workbench om de data te zien.
    $servername = "********";
    $username = "********";
    $password = "********";
    $database = "********";

    $db = mysqli_connect($servername, $username, $password, $database);

if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
} else {

}

?>
