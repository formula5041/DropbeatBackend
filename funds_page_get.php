<?php
    include('./Connection.php');

    // $sql = "SELECT end_date FROM DONATE";
    // $sql = "SELECT end_date TIMESTAMPDIFF(DAY, '2003-05-04', '2003-05-05') AS lastDate from DONATE";
    $sql = "SELECT donate_id, initiator, donate_name, info, goal, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo from DONATE";
    
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
?>