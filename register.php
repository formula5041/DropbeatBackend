<?php

    include('./Connection.php');
    
    $id = htmlspecialchars($_POST["id"]);
    $account = htmlspecialchars($_POST["account"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $birthday = htmlspecialchars($_POST["birthday"]);

    $sql= "INSERT INTO MEMBER(member_id, account, password, email, birthday, setup_date, alter_date, suspend) VALUE (?, ?, ?, ?, ?, NOW(), NOW(), 0 )";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $id);
    $statement -> bindValue(2, $account);
    $statement -> bindValue(3, $pwd);
    $statement -> bindValue(4, $email);
    $statement -> bindValue(5, $birthday);
    $statement -> execute();

?>