<?php 
include('./Connection.php');
$memberId = $_POST['memberId'];
$sql = 'SELECT * FROM MUSIC WHERE musician = ? and publish = 1 and album IS NULL';
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $memberId);
$statement -> execute();
$data = $statement -> fetchAll();
echo json_encode($data)
?>