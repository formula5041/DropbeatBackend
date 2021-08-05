<?php

    include('./Connection.php');
    
    $account = htmlspecialchars($_POST["account"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $birthday = htmlspecialchars($_POST["birthday"]);

    // $sql= "INSERT INTO MEMBER(member_id, member_name, account, password, email, birthday, setup_date, member_photo, alter_date, suspend) VALUE (0, ?, ?, ?, ?, ?, NOW(), ?, NOW(), 0 )";
    $sql= "INSERT INTO MEMBER(member_id, member_name, account, password, email, birthday, setup_date, member_photo, alter_date, suspend) VALUE (0, :nname, :account, :pwd, :email, :birthday, NOW(), :headshot, NOW(), 0 )";

    // $statement = $pdo ->prepare($sql);
    // $statement -> bindParam(1, $account);
    // $statement -> bindParam(2, $account);
    // $statement -> bindParam(3, $pwd);
    // $statement -> bindParam(4, $email);
    // $statement -> bindParam(5, $birthday);
    // $statement -> bindValue(6, 'https://reurl.cc/XWMenM');
    // $statement -> execute();

    $statement = $pdo ->prepare($sql);
    $statement -> bindParam(":nname", $account);
    $statement -> bindParam(":account", $account);
    $statement -> bindParam(":pwd", $pwd);
    $statement -> bindParam(":email", $email);
    $statement -> bindParam(":birthday", $birthday);
    $statement -> bindValue(":headshot", 'https://reurl.cc/XWMenM');
    $statement -> execute();

?>