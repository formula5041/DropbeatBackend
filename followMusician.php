<?php
include('./Connection.php');
$memberId = htmlspecialchars($_POST['memberId']);
$musicianId = htmlspecialchars($_POST['musicianId']);
$isFollow = htmlspecialchars($_POST['isFollow']);
echo $isFollow;

if ($isFollow == 'true') {
    $sql = "INSERT INTO FOLLOW (member, musican, setup_date) VALUES (?, ?, NOW())";
} else {
    $sql = "DELETE FROM FOLLOW WHERE member = ? and musican = ?";
}

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $memberId);
$statement -> bindValue(2, $musicianId);
$statement -> execute();

?>