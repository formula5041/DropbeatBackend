<?php
    include('./Connection.php');

    $sql = "SELECT message_mus_id, member, setup_date, content FROM MESSAGE_MUS";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data); 
?>