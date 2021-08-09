<?php
    include('../Connection.php');
    $imgCount = htmlspecialchars($_POST["length"]);
    for ($i = 0; $i < $imgCount; $i++) {
        $fileArr = 'file'.$i;
        $fileName_arr = $_FILES[$fileArr]["name"];    //檔案名稱含副檔名    
        $fileTmpName_arr =$_FILES[$fileArr]["tmp_name"]; //Server上的暫存檔路徑含檔名    

        $filePath_Temp = $fileTmpName_arr;
        
        //檔案最終存放位置((到時候上架路徑要改))
        $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
        $filePath = "http://localhost/DropbeatBackend/UploadImg/".$fileName_arr;
        $safePics = $ServerRoot."/DropbeatBackend/UploadImg/".$fileName_arr;

        move_uploaded_file($filePath_Temp, $safePics);

        // 存DB
        $option_id = 'donate_option_id'.$i;
        $donate_option_id = htmlspecialchars($_POST[$option_id]);
        $donate = htmlspecialchars($_POST['donate']);
        $name = 'option_name'.$i;
        $option_name = htmlspecialchars($_POST[$name]);
        $reward = 'option_reward'.$i;
        $option_reward = htmlspecialchars($_POST[$reward]);
        $price = 'option_price'.$i;
        $option_price = htmlspecialchars($_POST[$price]);
        $numN = 'num'.$i;
        $num = htmlspecialchars($_POST[$numN]);

        $sql= "INSERT INTO DONATEOPTION(donate_option_id, donate, option_name, option_img, option_reward, option_price, limited, num, send_date, option_remark, setup_date) VALUE (?, ?, ?, ?, ?, ?, 0, ?, NOW(), '只寄臺灣本島', NOW())";

        $statement = $pdo ->prepare($sql);
        $statement -> bindValue(1, $donate_option_id);
        $statement -> bindValue(2, $donate);
        $statement -> bindValue(3, $option_name);
        $statement -> bindValue(4, $filePath);
        $statement -> bindValue(5, $option_reward);
        $statement -> bindValue(6, $option_price);
        $statement -> bindValue(7, $num);
        $statement -> execute();
    }
?>