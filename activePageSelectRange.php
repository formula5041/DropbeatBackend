<?php
    include('./Connection.php');
    $range = ($_POST["rangeed"]);
    if ( $range == 'range0') {
        $sql = "SELECT * from ACTIVITY where remove != 1";
    } else if ( $range == 'range1') {
        $sql = "SELECT * from ACTIVITY 
                where 
                    activity_area = '臺北市' or 
                    activity_area = '新北市' or 
                    activity_area = '基隆市' or
                    activity_area = '桃園市' or 
                    activity_area = '新竹縣' or 
                    activity_area = '新竹市' and remove != 1";
    } else if ( $range == 'range2') {
        $sql = "SELECT * from ACTIVITY 
                where 
                    activity_area = '苗栗縣' or 
                    activity_area = '臺中市' or 
                    activity_area = '彰化縣' or
                    activity_area = '南投縣' or 
                    activity_area = '雲林縣' and remove != 1";
    } else if ( $range == 'range3') {
        $sql = "SELECT * from ACTIVITY 
                where 
                    activity_area = '嘉義縣' or
                    activity_area = '嘉義市' or
                    activity_area = '臺南市' or 
                    activity_area = '高雄市' or
                    activity_area = '屏東縣' and remove != 1";
    } else if ( $range == 'range4') {
        $sql = "SELECT * from ACTIVITY 
                where 
                    activity_area = '宜蘭縣' or 
                    activity_area = '花蓮縣' or 
                    activity_area = '臺東縣' and remove != 1";
    } else if ( $range == 'range5') {
        $sql = "SELECT * from ACTIVITY 
                where 
                    activity_area = '澎湖縣' or 
                    activity_area = '金門縣' or 
                    activity_area = '連江縣' and remove != 1";
    }

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
    
?>