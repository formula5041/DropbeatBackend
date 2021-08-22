<?php
    include('../Connection.php');
    $nowChange = ($_POST["nowChange"]); // [0, 0, 0, 0] 用來判斷哪幾個是有修改
    $donate = ($_POST["donate"]);
    $length = ($_POST["length"]); // nowLength
    $oldLength = ($_POST["oldLength"]); // 原本的陣列長度
    
    for ($i = 0; $i < $length; $i++) {
        if($i < $oldLength) {
            $changeArr = $nowChange[$i*2]; // *2是因為$nowChange[0,0,0,0]是字串(抓偶數)
            if ($changeArr == '0'){
                echo 'nochange';
                $file_arr = 'file'.$i;
                $file = ($_POST[$file_arr]);
                $theRealPath = $file;
                echo $theRealPath;
                echo "<br>";
            } else {
                echo 'ischange';
                //取得上傳的檔案資訊=======================================
                $fileArr = 'file'.$i;
                $fileName_arr = $_FILES[$fileArr]["name"];    //檔案名稱含副檔名    
                $fileTmpName_arr =$_FILES[$fileArr]["tmp_name"]; //Server上的暫存檔路徑含檔名    
        
                $filePath_Temp = $fileTmpName_arr;
                
                //檔案最終存放位置((到時候上架路徑要改))
                $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
                // $filePath = "http://localhost/Dropbeat/public/fundFile/".$fileName_arr;
                $filePath = '/fundFile/'.$fileName_arr;
                $safePics = $ServerRoot."/Dropbeat/public/fundFile/".$fileName_arr;
                move_uploaded_file($filePath_Temp, $safePics);
                $theRealPath = $filePath;
                echo $theRealPath;
                echo "<br>";
            }
            $donate_option_id_arr = 'donate_option_id'.$i;
            $donate_option_id = htmlspecialchars($_POST[$donate_option_id_arr]);

            $option_name_arr = 'option_name'.$i;
            $option_name = htmlspecialchars($_POST[$option_name_arr]);

            $option_reward_arr = 'option_reward'.$i;
            $option_reward = htmlspecialchars($_POST[$option_reward_arr]);

            $option_price_arr = 'option_price'.$i;
            $option_price = htmlspecialchars($_POST[$option_price_arr]);

            $num_arr = 'num'.$i;
            $num = htmlspecialchars($_POST[$num_arr]);
            

            $sql= "UPDATE DONATEOPTION SET 
                    donate_option_id=?, 
                    donate=?, 
                    option_name=?, 
                    option_img=?, 
                    option_reward=?, 
                    option_price=?, 
                    num=?, 
                    setup_date=NOW() 
                        where donate_option_id = ?";

            $statement = $pdo ->prepare($sql);
            $statement -> bindValue(1, $donate_option_id);
            $statement -> bindValue(2, $donate);
            $statement -> bindValue(3, $option_name);
            $statement -> bindValue(4, $theRealPath);
            $statement -> bindValue(5, $option_reward);
            $statement -> bindValue(6, $option_price);
            $statement -> bindValue(7, $num);
            $statement -> bindValue(8, $donate_option_id);
            $statement -> execute();
        } else {
            $changeArr = $nowChange[$i*2]; // *2是因為$nowChange[0,0,0,0]是字串(抓偶數)
            if ($changeArr == '0'){
                echo 'nochange';
                $file_arr = 'file'.$i;
                $file = ($_POST[$file_arr]);
                $theRealPath = $file;
                echo $theRealPath;
                echo "<br>";
            } else {
                echo 'ischange';
                //取得上傳的檔案資訊=======================================
                $fileArr = 'file'.$i;
                $fileName_arr = $_FILES[$fileArr]["name"];    //檔案名稱含副檔名    
                $fileTmpName_arr =$_FILES[$fileArr]["tmp_name"]; //Server上的暫存檔路徑含檔名    
        
                $filePath_Temp = $fileTmpName_arr;
                
                //檔案最終存放位置((到時候上架路徑要改))
                $ServerRoot = $_SERVER["DOCUMENT_ROOT"];
                // $filePath = "http://localhost/Dropbeat/public/fundFile/".$fileName_arr;
                $filePath = '/fundFile/'.$fileName_arr;
                $safePics = $ServerRoot."/Dropbeat/public/fundFile/".$fileName_arr;
                move_uploaded_file($filePath_Temp, $safePics);
                $theRealPath = $filePath;
                echo $theRealPath;
                echo "<br>";
            }
            $donate_option_id_arr = 'donate_option_id'.$i;
            $donate_option_id = htmlspecialchars($_POST[$donate_option_id_arr]);

            $option_name_arr = 'option_name'.$i;
            $option_name = htmlspecialchars($_POST[$option_name_arr]);

            $option_reward_arr = 'option_reward'.$i;
            $option_reward = htmlspecialchars($_POST[$option_reward_arr]);

            $option_price_arr = 'option_price'.$i;
            $option_price = htmlspecialchars($_POST[$option_price_arr]);

            $num_arr = 'num'.$i;
            $num = htmlspecialchars($_POST[$num_arr]);
            

            $sql= "INSERT INTO DONATEOPTION(donate_option_id, donate, option_name, option_img, option_reward, option_price, limited, num, send_date, option_remark, setup_date) VALUE (?, ?, ?, ?, ?, ?, 0, ?, NOW(), '只寄臺灣本島', NOW())";

            $statement = $pdo ->prepare($sql);
            $statement -> bindValue(1, $donate_option_id);
            $statement -> bindValue(2, $donate);
            $statement -> bindValue(3, $option_name);
            $statement -> bindValue(4, $theRealPath);
            $statement -> bindValue(5, $option_reward);
            $statement -> bindValue(6, $option_price);
            $statement -> bindValue(7, $num);
            $statement -> execute();
        }
    }
?>