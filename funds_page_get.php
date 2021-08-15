<?php
    include('./Connection.php');

    // $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, donate_num, round((goal_now/goal)*100) as goal_percent, (donate_id) as toTheDonate 
    // from DONATE where TIMESTAMPDIFF(DAY, NOW(), end_date) > 0 and remove != 1 order by setup_date asc";
    $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, (donate_id) as toTheDonate 
    from DONATE where TIMESTAMPDIFF(DAY, NOW(), end_date) > 0 and remove != 1 order by setup_date asc";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>