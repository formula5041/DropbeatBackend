<?php
    include('../Connection.php');

    $sql = "SELECT donate_id, initiator, donate_name, info, goal,end_date, donate_photo  FROM DONATE";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
?>