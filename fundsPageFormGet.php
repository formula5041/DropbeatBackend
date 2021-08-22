<?php
    include('./Connection.php');

    $donate_option_id = $_POST["donate_option_id"];
    
    $sql = "SELECT * from DONATEOPTION where donate_option_id = $donate_option_id";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>