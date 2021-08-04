<?php
    $Name = htmlspecialchars($_POST["Name"]);
    $Account = htmlspecialchars($_POST["Account"]);
    $PWD = htmlspecialchars($_POST["PWD"]);

    //登入資料庫-------------------------------------------
    include("./connection.php");

    //判斷資料是否為空值，並執行寫入資料庫動作-------------------------------------------
    if($Name != "" && $PWD != "" && $Account != ""){

        //寫入資料
        $sql = "INSERT INTO dropbeat.admin(admin_name, account, password, authority, setup_date, alter_date) VALUES ('".$Name."','".$Account."', '".$PWD."','1', now(), now())";

        //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
        $statement = $pdo->query($sql);
    

        echo "註冊成功！";
    }
    

    

?>