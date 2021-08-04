<?php

    include('./Connection.php');
    
    $account = htmlspecialchars($_POST["account"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $birthday = htmlspecialchars($_POST["birthday"]);

    $sql= "INSERT INTO MEMBER(member_id, account, password, email, birthday, setup_date, alter_date, suspend) VALUE (0, ?, ?, ?, ?, NOW(), NOW(), 0 )";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $account);
    $statement -> bindValue(2, $pwd);
    $statement -> bindValue(3, $email);
    $statement -> bindValue(4, $birthday);
    $statement -> execute();

?>