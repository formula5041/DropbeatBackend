<?php
    include('./Connection.php');
    $progress = ($_POST["progressed"]);
    if ( $progress == 'progress0') {
        $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, (donate_id) as toTheDonate from DONATE where TIMESTAMPDIFF(DAY, NOW(), end_date) > 0";
    } else if ( $progress == 'progress1') {
        $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, (donate_id) as toTheDonate from DONATE where TIMESTAMPDIFF(DAY, NOW(), end_date) < 0";
    } else if ( $progress == 'progress2') {
        $sql = "SELECT donate_id, initiator, donate_name, info, goal, setup_date, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo, (donate_id) as toTheDonate from DONATE";
    }

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
    
?>