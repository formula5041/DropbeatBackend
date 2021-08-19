<?php
    include('./Connection.php');

    // $sql = "SELECT * from ACTIVITY Limit 5";

    $sql = "SELECT e.*, d.account FROM ACTIVITY e
            join MEMBER d
            on d.member_id = e.initiator Limit 5";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>