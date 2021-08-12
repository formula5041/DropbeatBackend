<?php
    include('./Connection.php');

    $sql = "SELECT donate_id, initiator, donate_name, info, goal, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo from DONATE";
    
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
?>