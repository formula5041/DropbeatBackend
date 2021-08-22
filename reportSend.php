<?php
    include('./Connection.php');

    $report_id = htmlspecialchars($_POST["report_id"]);
    $report_option = htmlspecialchars($_POST["report_option"]);

    $sql= "INSERT INTO REPORT(report_id, report_option) VALUE (?, ?)";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $report_id);
    $statement -> bindValue(2, $report_option);
    $statement -> execute();
?>