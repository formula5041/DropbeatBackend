<?php
    include('./Connection.php');

    $activity_id = $_POST["activity_id"];
    $member_id = $_POST["member_id"];
    
    $sql = "SELECT * FROM ACTIVITYDETAIL where activity = ? and member = ?";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["activity_id"]);
    $statement->bindValue(2, $_POST["member_id"]);
    $statement->execute();
    $data = $statement->fetchAll();

    if ($data) {
        echo json_encode($data);
        $sql = "DELETE FROM ACTIVITYDETAIL WHERE activity = ? and member = ?";
        $statement = $pdo -> prepare($sql);
        $statement -> bindValue(1, $activity_id);
        $statement -> bindValue(2, $member_id);
        $statement -> execute();
    } else {
        $sql= "INSERT INTO ACTIVITYDETAIL(activity, member, setup_date) VALUE (?, ?, NOW())";
        $statement = $pdo->prepare($sql);
        $statement -> bindValue(1, $activity_id);
        $statement -> bindValue(2, $member_id);
        $statement -> execute();
    }
    

    // $statement = $pdo->prepare($sql);
    // $statement -> bindValue(1, $activity_id);
    // $statement -> bindValue(2, $member_id);
    // $statement -> execute();

    // $sql= "INSERT INTO ACTIVITYDETAIL(activity, member, setup_date) VALUE (?, ?, NOW())";


    // $data = $statement->fetchAll();
    
    // echo json_encode($data);
?>