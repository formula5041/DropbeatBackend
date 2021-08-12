<?php
    //判斷是否上傳成功
    if($_FILES["file"]["error"] > 0){
        echo "上傳失敗: 錯誤代碼".$_FILES["file"]["error"];
    }else{
        //取得上傳的檔案資訊=======================================
        $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        //=======================================================

        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        
        //檔案最終存放位置(到時候上架路徑要改)
        $filePath = "http://localhost/Dropbeat/public/fundFile/".$fileName;
        $safePics = $ServerRoot."/Dropbeat/public/fundFile/".$fileName;
        //將暫存檔搬移到正確位置
        move_uploaded_file($filePath_Temp, $safePics); //(舊家, 新家)

        // 存DB
        include('../Connection.php');

        $donate_id = htmlspecialchars($_POST["donate_id"]);
        $initiator = htmlspecialchars($_POST["initiator"]);
        $donate_name = htmlspecialchars($_POST["donate_name"]);
        $info = htmlspecialchars($_POST["info"]);
        $goal = htmlspecialchars($_POST["goal"]);
        $end_date = htmlspecialchars($_POST["end_date"]);

        // 存取DONATE TABLE
        $sql= "INSERT INTO DONATE(donate_id, initiator, donate_name, info, goal, setup_date, end_date, donate_photo, approved, remove, alter_date) VALUE (?, ?, ?, ?, ?, NOW(), ?, ?, 0, 0, NOW())";

        $statement = $pdo ->prepare($sql);
        $statement -> bindValue(1, $donate_id);
        $statement -> bindValue(2, $initiator);
        $statement -> bindValue(3, $donate_name);
        $statement -> bindValue(4, $info);
        $statement -> bindValue(5, $goal);
        $statement -> bindValue(6, $end_date);
        $statement -> bindValue(7, $filePath);
        $statement -> execute();
    }
?>
