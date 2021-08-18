<?php
include('./Connection.php');

$account = htmlspecialchars($_POST['account']);
$sql = 'SELECT * FROM MEMBER where account = ?';

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $account);
$statement -> execute();
$data = $statement -> fetch();

echo json_encode($data)

?>