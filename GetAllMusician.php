<?php
include('./Connection.php');

$sql = "SELECT musician_id, musician_name, musicial_photo FROM MUSICIAN";

$statement = $pdo -> prepare($sql);
$statement -> execute();
$data = $statement -> fetchAll();

echo json_encode($data);

?>