<?php
    include('../Connection.php');

    // ACTIVITY
    $activity_id = htmlspecialchars($_POST["activity_id"]);

    $sql= "DELETE from ACTIVITY where activity_id = ?";
    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $activity_id);
    $statement -> execute();
?>