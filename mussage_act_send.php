<?php
    include('./Connection.php');

    $message_id = htmlspecialchars($_POST["message_id"]);
    $member = htmlspecialchars($_POST["member"]);
    $musician = htmlspecialchars($_POST["musician"]);
    // $setup_date = htmlspecialchars($_POST["setup_date"]);
    $content = htmlspecialchars($_POST["content"]);

    $sql= "INSERT INTO MESSAGE_ACT(message_act_id, member, activity, setup_date, content, report, remove) VALUE (?, ?, ?, NOW(), ?, 0, 0 )";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $message_id);
    $statement -> bindValue(2, $member);
    $statement -> bindValue(3, $musician);
    $statement -> bindValue(4, $content);
    $statement -> execute();
?>