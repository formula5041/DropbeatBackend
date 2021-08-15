<?php
    include('./Connection.php');

    $donate_id = $_POST["donate_id"];
    
    $sql = "SELECT *, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate from DONATE where donate_id = $donate_id";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>