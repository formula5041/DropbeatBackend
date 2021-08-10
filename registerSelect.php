<?php
    include('./Connection.php');

    // 回傳註冊好的資訊
    $accountThis = htmlspecialchars($_POST["accountThis"]);
    $sql = "SELECT * FROM MEMBER where account = ?";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $accountThis);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data); 
?>