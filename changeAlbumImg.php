<?php 
include('./Connection.php');

$albumId = htmlspecialchars($_POST['albumId']);
$ServerRoot = $_SERVER['DOCUMENT_ROOT'];

if($_FILES['albumImg']['error'] > 0){
    echo '上傳失敗';
  }else{
    $albumPhotoName = $_FILES['albumImg']['name'];
    $albumPhoto_temp = $_FILES['albumImg']['tmp_name'];
    $albumPhotoType = $_FILES['albumImg']['type'];
    $albumPhotoSize = $_FILES['albumImg']['size'];
  }
  $albumPhotoPath = $ServerRoot.'/tfd102/project/g1/dist/albumPhoto/'.$albumPhotoName;
  $albumPhoto = '/albumPhoto/'.$albumPhotoName;
  move_uploaded_file($albumPhoto_temp, $albumPhotoPath);

$sql = "UPDATE ALBUM SET album_photo = ? WHERE album_id = ? ";

$statement = $pdo->prepare($sql);
$statement -> bindValue(1, $albumPhoto);
$statement -> bindValue(2, $albumId);
$statement -> execute();

?>