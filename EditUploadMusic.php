<?php 
include('./Connection.php');

$musicId = $_POST['musicId'];


$title = htmlspecialchars($_POST["title"]);
$setTime = htmlspecialchars($_POST["setTime"]);
$type = htmlspecialchars($_POST["type"]);
$lyrics = htmlspecialchars($_POST["lyrics"]);
$publish = htmlspecialchars($_POST['publish']);
$musicId = htmlspecialchars($_POST['musicId']);




$musicTypeSql = "SELECT musictype_id FROM MUSICTYPE WHERE type_name = ?";

$musictypeIdState = $pdo -> prepare($musicTypeSql);
$musictypeIdState -> bindValue(1, $type);
$musictypeIdState -> execute();
$musictypeId = $musictypeIdState -> fetch();

$sql = "UPDATE MUSIC SET music_name = ?, music_type = ?, setup_date = ?, lyrics = ?, publish = ?, alter_date = NOW() WHERE music_id = ? ";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $title);
$statement -> bindValue(2, $musictypeId[0]);
$statement -> bindValue(3, $setTime);
$statement -> bindValue(4, $lyrics);
$statement -> bindValue(5, $publish);
$statement -> bindValue(6, $musicId);
$statement -> execute();
if($publish == 0) {
    $albumreset = "UPDATE MUSIC SET album = NULL WHERE music_id = ?";
    $resetstatement = $pdo -> prepare($albumreset);
    $resetstatement -> bindValue(1, $musicId);
    $resetstatement -> execute();
}

?>