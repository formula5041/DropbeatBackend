<?php
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);

$sql = "DELETE FROM MUSIC WHERE music_id = ?";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> execute();

?>