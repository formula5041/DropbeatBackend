<?php
    include('./Connection.php');

    $sql = "SELECT e.*, d.account FROM ACTIVITY e
            join MEMBER d
            on d.member_id = e.initiator";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>