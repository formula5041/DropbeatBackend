<?php
    include('../Connection.php');
    if ($_FILES){
        echo 'ischange';
        //取得上傳的檔案資訊=======================================
        $fileName = $_FILES["file"]["name"];    //檔案名稱含副檔名        
        $filePath_Temp = $_FILES["file"]["tmp_name"];   //Server上的暫存檔路徑含檔名        
        //=======================================================

        //Web根目錄真實路徑
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        
        //檔案最終存放位置(到時候上架路徑要改)
        // $filePath = "http://localhost/Dropbeat/public/activityFile/".$fileName;
        $filePath = './activityFile/'.$fileName;
        $safePics = $ServerRoot."/tfd102/project/g1/dist/activityFile/".$fileName;
        //將暫存檔搬移到正確位置
        move_uploaded_file($filePath_Temp, $safePics); //(舊家, 新家)
        $theRealPath = $filePath;
    } else {
        echo 'nochange';
        $file = htmlspecialchars($_POST["file"]);
        $theRealPath = $file;
    }
    $activity_id = htmlspecialchars($_POST["activity_id"]);
    $activity_name = htmlspecialchars($_POST["activity_name"]);
    $activity_date = htmlspecialchars($_POST["activity_date"]);
    $activity_time = htmlspecialchars($_POST["activity_time"]);
    $activity_area = htmlspecialchars($_POST["activity_area"]);
    $place = htmlspecialchars($_POST["place"]);
    $info = htmlspecialchars($_POST["info"]);
    
    
    $sql= "UPDATE ACTIVITY SET activity_name = ?, activity_date = ?, activity_time = ?, activity_area = ?, place = ?, info = ?, activity_photo = ?, alter_date = now() WHERE activity_id = ?";

    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $activity_name);
    $statement -> bindValue(2, $activity_date);
    $statement -> bindValue(3, $activity_time);
    $statement -> bindValue(4, $activity_area);
    $statement -> bindValue(5, $place);
    $statement -> bindValue(6, $info);
    $statement -> bindValue(7, $theRealPath);
    $statement -> bindValue(8, $activity_id);
    $statement -> execute();
    
?>

