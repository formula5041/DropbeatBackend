<?php
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "00000000";
    $db_select = "dropbeat";

    $dns = "mysql:host=".$db_host.";dbname=".$db_select;

    $pdo = new PDO($dns, $db_user, $db_pass);

?>

<!-- http://localhost/DropbeatBackend/register.php -->