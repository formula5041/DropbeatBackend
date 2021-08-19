<?php
    include('./Connection.php');

    $account = htmlspecialchars($_POST["account"]);

    // 判斷帳號是否重複
    $sqlSearch = "SELECT account FROM MEMBER where account = ?";

    $statementSearch = $pdo ->prepare($sqlSearch);
    $statementSearch -> bindValue(1, $account);
    $statementSearch->execute();
    $datas = $statementSearch->fetch();

    if ($datas[0] !== $account) {
        // 註冊帳號
        $email = htmlspecialchars($_POST["email"]);
        $pwd = htmlspecialchars($_POST["pwd"]);
        $birthday = htmlspecialchars($_POST["birthday"]);

        $sql= "INSERT INTO MEMBER(member_id, member_name, account, password, email, birthday, setup_date, member_photo, alter_date, suspend) VALUE (0, :nname, :account, :pwd, :email, :birthday, NOW(), :headshot, NOW(), 0 )";

        $statement = $pdo ->prepare($sql);
        $statement -> bindParam(":nname", $account);
        $statement -> bindParam(":account", $account);
        $statement -> bindParam(":pwd", $pwd);
        $statement -> bindParam(":email", $email);
        $statement -> bindParam(":birthday", $birthday);
        $statement -> bindValue(":headshot", '/default_avatar.jpg');
        $statement -> execute();
        

        // 抓到剛註冊完的member_id
        $sqls = "SELECT member_id, account FROM MEMBER where account = ? ";

        $statements = $pdo ->prepare($sqls);
        $statements -> bindValue(1, $account);
        $statements->execute();
        $data = $statements->fetch();
        echo $data[0];
        echo $data[1];



        // 註冊音樂人(與註冊會員同步)
        
        $sqlMusician= "INSERT INTO MUSICIAN(member, musician_name, musicial_photo, alter_date, remove) VALUE (?, ?, '/default_avatar.jpg', NOW(),0)";

        $statementMusician = $pdo ->prepare($sqlMusician);
        $statementMusician -> bindParam(1, $data[0]);
        $statementMusician -> bindParam(2, $data[1]);
        $statementMusician -> execute();

        echo $account.'帳號已建立';
    } else {
        echo $account;
    }
?>