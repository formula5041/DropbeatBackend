<?php
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);

$sql = "DELETE FROM ALBUM WHERE album_id = ?";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> execute();

?>