<?php
    include('./Connection.php');
    $activeId = ($_POST["activity"]);
    
    $sql = "SELECT e.message_act_id, e.member, d.member_photo, e.setup_date, e.content, d.account
            FROM MESSAGE_ACT e
            join MEMBER d
            on d.member_id = e.member 
            WHERE activity = $activeId";
    
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
?>