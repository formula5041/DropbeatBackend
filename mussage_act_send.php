<?php
    include('./Connection.php');

    $member = htmlspecialchars($_POST["member"]);
    $activity = htmlspecialchars($_POST["activity"]);
    $content = htmlspecialchars($_POST["content"]);

    $sql= "INSERT INTO MESSAGE_ACT(member, activity, setup_date, content, report, remove) VALUE (?, ?, NOW(), ?, 0, 0 )";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $member);
    $statement -> bindValue(2, $activity);
    $statement -> bindValue(3, $content);
    $statement -> execute();
?>