<?php
    include('../Connection.php');

    $initiator = htmlspecialchars($_POST["initiator"]);

    // $sql = "SELECT donate_id, initiator, donate_name, info, goal, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, end_date, donate_photo 
    // FROM DONATE where initiator = ? ";

    $sql = "SELECT e.*, d.account, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate
    FROM DONATE e 
    join MEMBER d
    on d.member_id = e.initiator
    where initiator = ?";


    // $sql = "SELECT e.*, d.account 
    // FROM ACTIVITY e
    // join MEMBER d
    // on d.member_id = e.initiator Limit 5";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["initiator"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);
?>