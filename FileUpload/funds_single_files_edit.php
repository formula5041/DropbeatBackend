<?php
    include('../Connection.php');
    // $file = htmlspecialchars($_POST["file"]);
    // echo $file;
    if ($_FILES){
        echo 'ischange';
        //取得上傳的檔案資訊=======================================
        $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        //=======================================================

        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        
        //檔案最終存放位置(到時候上架路徑要改)
        $filePath = "http://localhost/DropbeatBackend/UploadImg/".$fileName;
        $safePics = $ServerRoot."/DropbeatBackend/UploadImg/".$fileName;
        //將暫存檔搬移到正確位置
        move_uploaded_file($filePath_Temp, $safePics); //(舊家, 新家)
        $theRealPath = $filePath;
    } else {
        echo 'nochange';
        $file = htmlspecialchars($_POST["file"]);
        $theRealPath = $file;
    }
    $donate_id = htmlspecialchars($_POST["donate_id"]);
    $donate_name = htmlspecialchars($_POST["donate_name"]);
    $info = htmlspecialchars($_POST["info"]);
    $goal = htmlspecialchars($_POST["goal"]);
    $end_date = htmlspecialchars($_POST["end_date"]);
    

    // $sql= "INSERT INTO MESSAGE_ACT(message_act_id, member, activity, setup_date, content, report, remove) VALUE (?, ?, ?, NOW(), ?, 0, 0 )";
    // $sql = "UPDATE ec_category set Name = ?, Status = ?, UpdateDate = NOW() WHERE ID = ?";
    $sql= "UPDATE DONATE SET donate_name = ?, info = ?, goal = ?, end_date = ?, donate_photo = ? WHERE donate_id = ?";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $donate_name);
    $statement -> bindValue(2, $info);
    $statement -> bindValue(3, $goal);
    $statement -> bindValue(4, $end_date);
    $statement -> bindValue(5, $theRealPath);
    $statement -> bindValue(6, $donate_id);
    $statement -> execute();
    
?>

