<?php
    include('./Connection.php');

    // $account = htmlspecialchars($_POST["account"]);
    // $password = htmlspecialchars($_POST["password"]);

    // $sql = "SELECT * FROM MEMBER where account = ? and password = ? ";
    // // $sql = "SELECT * FROM MEMBER";


    // $statement = $pdo ->prepare($sql);
    // // $statement = $pdo->query($sql);
    // $statement->bindValue(1, $_POST["account"]);
    // $statement->bindValue(2, $_POST["password"]);
    // $statement->execute();
    // $data = $statement->fetchAll();

    // $memberAccount = "";
    // $memberPassword = "";
    // foreach($data as $index => $row){
    //     $memberAccount = $row["account"];
    //     $memberPassword = $row["password"];
    // }
    // // echo json_encode($memberAccount);
    // // echo json_encode($memberPassword);
    // echo json_encode($data); 

    // ----------------------------------------------------------------------
    //建立SQL語法
    $sql = "SELECT account FROM MEMBER";

    //執行並查詢，會回傳查詢結果的物件，必須使用fetch、fetchAll...等方式取得資料
    $statement = $pdo->query($sql);

    //抓出全部且依照順序封裝成一個二維陣列
    $data = $statement->fetchAll();

    echo json_encode($data);   // 轉成JSON
?>