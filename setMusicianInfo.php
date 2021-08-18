<?php 
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);
$info = htmlspecialchars($_POST['info']);

$sql = "UPDATE MUSICIAN SET info = ? WHERE musician_id = ?";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $info);
$statement -> bindValue(2, $id);
$statement -> execute();

?>
