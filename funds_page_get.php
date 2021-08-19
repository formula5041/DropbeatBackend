<?php
    include('./Connection.php');

    // $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, (donate_id) as toTheDonate 
    // from DONATE where TIMESTAMPDIFF(DAY, NOW(), end_date) > 0 and remove != 1 order by setup_date asc";
    $sql = "SELECT d.account, e.donate_id, e.initiator, e.donate_name, e.info, e.goal, e.setup_date, TIMESTAMPDIFF(DAY, NOW(), e.end_date) AS countdownDate, e.donate_photo, (e.donate_id) as toTheDonate 
    from DONATE e
    join member d
    on e.initiator = d.member_id
    where TIMESTAMPDIFF(DAY, NOW(), end_date) > 0 and remove != 1 
    order by setup_date asc";


    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>