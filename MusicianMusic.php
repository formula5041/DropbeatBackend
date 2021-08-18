<?php 
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);

$musicSql = "SELECT * FROM MUSIC WHERE musician = ? ";
 
$musicStatement = $pdo -> prepare($musicSql);
$musicStatement -> bindValue(1, $id);
$musicStatement -> execute();
$musicData = $musicStatement -> fetchAll();

echo json_encode($musicData);

?>