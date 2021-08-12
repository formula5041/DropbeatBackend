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
        $filePath = "http://localhost/Dropbeat/public/activityFile/".$fileName;
        $safePics = $ServerRoot."/Dropbeat/public/activityFile/".$fileName;
        //將暫存檔搬移到正確位置
        move_uploaded_file($filePath_Temp, $safePics); //(舊家, 新家)

        // 存DB
        include('../Connection.php');

        $activity_id = htmlspecialchars($_POST["activity_id"]);
        $initiator = htmlspecialchars($_POST["initiator"]);
        $activity_name = htmlspecialchars($_POST["activity_name"]);
        $activity_date = htmlspecialchars($_POST["activity_date"]);
        $activity_time = htmlspecialchars($_POST["activity_time"]);
        $area = htmlspecialchars($_POST["area"]);
        $place = htmlspecialchars($_POST["place"]);
        $info = htmlspecialchars($_POST["info"]);

        // 存取DONATE TABLE
        $sql= "INSERT INTO ACTIVITY(activity_id, initiator, activity_name, activity_date, activity_time, area, place, info, activity_photo, setup_date, approved, remove, alter_date) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 0, 0, NOW())";

        $statement = $pdo ->prepare($sql);
        $statement -> bindValue(1, $activity_id);
        $statement -> bindValue(2, $initiator);
        $statement -> bindValue(3, $activity_name);
        $statement -> bindValue(4, $activity_date);
        $statement -> bindValue(5, $activity_time);
        $statement -> bindValue(6, $area);
        $statement -> bindValue(7, $place);
        $statement -> bindValue(8, $info);
        $statement -> bindValue(9, $filePath);
        $statement -> execute();
    }
?>
