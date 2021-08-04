<?php
    include('./Connection.php');

    $account = htmlspecialchars($_POST["account"]);
    $password = htmlspecialchars($_POST["password"]);

    $sql = "SELECT * FROM MEMBER where account = ? and password = ? ";

    $statement = $pdo ->prepare($sql);
    $statement->bindValue(1, $_POST["account"]);
    $statement->bindValue(2, $_POST["password"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data); 
?>