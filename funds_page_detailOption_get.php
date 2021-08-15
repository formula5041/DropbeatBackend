<?php
    include('./Connection.php');

    $donate_id = $_POST["donate_id"];
    
    $sql = "SELECT * from DONATEOPTION where donate = $donate_id";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>