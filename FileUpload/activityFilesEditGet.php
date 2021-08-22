<?php
    include('../Connection.php');

    $activity_id = htmlspecialchars($_POST["activity_id"]);

    $sql = "SELECT * FROM ACTIVITY where activity_id = ? ";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["activity_id"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);
?>