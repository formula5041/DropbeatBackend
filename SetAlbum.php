<?php 
include('./Connection.php');

$albumTitle = htmlspecialchars($_POST['albumName']);
$albumDate = htmlspecialchars($_POST['albumDate']);
$albumPublish = htmlspecialchars($_POST['publish']);
$memberId = htmlspecialchars($_POST['musicain']);
$musicId = htmlspecialchars($_POST['musicId']);

$musicIdArr = explode(',' , $musicId);

$ServerRoot = $_SERVER['DOCUMENT_ROOT'];

if($_FILES['albumImg']['error'] > 0){
echo '上傳失敗';
}else{
$albumPhotoName = $_FILES['albumImg']['name'];
$albumPhoto_temp = $_FILES['albumImg']['tmp_name'];
$albumPhotoType = $_FILES['albumImg']['type'];
$albumPhotoSize = $_FILES['albumImg']['size'];
}
$albumPhotoPath = $ServerRoot.'/DropBeat/public/albumPhoto/'.$albumPhotoName;
$albumPhoto = '/albumPhoto/'.$albumPhotoName;
move_uploaded_file($albumPhoto_temp, $albumPhotoPath);

$sql = "INSERT INTO ALBUM(album_name, album_photo, musician, publish, setup_date, alte_rdate, remove) VALUE (?, ?, ?, ?, ?, NOW(), 0)";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $albumTitle);
$statement -> bindValue(2, $albumPhoto);
$statement -> bindValue(3, $memberId);
$statement -> bindValue(4, $albumPublish);
$statement -> bindValue(5, $albumDate);
$statement -> execute();

$getAlbumId = "SELECT album_id FROM ALBUM ORDER BY album_id DESC LIMIT 1";
$getAlbumStatement = $pdo -> prepare($getAlbumId);
$getAlbumStatement -> execute();
$data = $getAlbumStatement -> fetch();

echo $data[0];

foreach($musicIdArr as $index => $value) {
  $setAlbumInMusic = "UPDATE MUSIC SET album = ? WHERE music_id = $value";
  $setAlbumINMUsicStatement = $pdo -> prepare($setAlbumInMusic);
  $setAlbumINMUsicStatement -> bindValue(1, $data[0]);
  $setAlbumINMUsicStatement -> execute();
}


?>