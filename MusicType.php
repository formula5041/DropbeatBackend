<?php 
include('./Connection.php');

$sql = "SELECT type_name FROM MUSICTYPE";

$statement = $pdo -> query($sql);
$statement -> execute();
$data = $statement -> fetchAll();
echo json_encode($data)
?>