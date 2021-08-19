<?php
    include('./Connection.php');

    $activity_id = $_POST["activity_id"];
    
    $sql = "SELECT e.*, d.account FROM ACTIVITY e
            join MEMBER d
            on d.member_id = e.initiator
            where activity_id = $activity_id";


    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>