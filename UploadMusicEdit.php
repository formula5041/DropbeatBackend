<?php 
include('./Connection.php');
$musicName = htmlspecialchars($_POST['name']);
$sql = "SELECT * FROM MUSIC WHERE music_name = ? ";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $musicName);
$statement -> execute();
$data = $statement -> fetch();
echo json_encode($data)
?>