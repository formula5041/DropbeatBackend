<?php
    include('../Connection.php');

    $initiator = htmlspecialchars($_POST["initiator"]);

    // $sql = "SELECT * FROM DONATE where initiator = ? ";
    $sql = "SELECT donate_id, initiator, donate_name, info, goal, TIMESTAMPDIFF(DAY, NOW(), end_date) AS countdownDate, donate_photo FROM DONATE where initiator = ? ";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["initiator"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);
?>