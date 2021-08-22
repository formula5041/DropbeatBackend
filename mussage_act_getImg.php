<?php
    include('./Connection.php');
    $id = ($_POST["id"]);
    
    $sql = "SELECT member_photo FROM MEMBER WHERE member_id = $id";
    
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    echo json_encode($data);
?>
