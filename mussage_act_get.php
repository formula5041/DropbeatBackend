<?php
    include('./Connection.php');

    $sql = "SELECT message_act_id, member, setup_date, content FROM MESSAGE_ACT";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data); 
?>