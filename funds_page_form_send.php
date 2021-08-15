<?php
    include('./Connection.php');

    $donate = htmlspecialchars($_POST["donate"]);
    $member = htmlspecialchars($_POST["member"]);
    $donate_option = htmlspecialchars($_POST["donate_option"]);
    $else_donate_price = htmlspecialchars($_POST["else_donate_price"]);
    $total_price = htmlspecialchars($_POST["total_price"]);
    $real_name = htmlspecialchars($_POST["real_name"]);
    $postalcode = htmlspecialchars($_POST["postalcode"]);
    $address = htmlspecialchars($_POST["address"]);
    $cellphone = htmlspecialchars($_POST["cellphone"]);
    $email = htmlspecialchars($_POST["email"]);
    $remark = htmlspecialchars($_POST["remark"]);


    $sql= "INSERT INTO DONATEDETAIL(donate, member, donate_option, else_donate_price, total_price, real_name, postalcode, address, cellphone, email, remark, payment, setup_date) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, NOW())";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $donate);
    $statement -> bindValue(2, $member);
    $statement -> bindValue(3, $donate_option);
    $statement -> bindValue(4, $else_donate_price);
    $statement -> bindValue(5, $total_price);
    $statement -> bindValue(6, $real_name);
    $statement -> bindValue(7, $postalcode);
    $statement -> bindValue(8, $address);
    $statement -> bindValue(9, $cellphone);
    $statement -> bindValue(10, $email);
    $statement -> bindValue(11, $remark);
    $statement -> execute();
?>