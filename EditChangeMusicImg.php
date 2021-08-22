<?php 
include('./Connection.php');
$musicId = $_POST['musicId'];
$ServerRoot = $_SERVER['DOCUMENT_ROOT'];
  

if($_FILES['albumPhoto']['error'] > 0){
  echo '上傳失敗';
}else{
  $albumPhotoName = $_FILES['albumPhoto']['name'];
  $albumPhoto_temp = $_FILES['albumPhoto']['tmp_name'];
  $albumPhotoType = $_FILES['albumPhoto']['type'];
  $albumPhotoSize = $_FILES['albumPhoto']['size'];
}
$albumPhotoPath = $ServerRoot.'/tfd102/project/g1/dist/albumPhoto/'.$albumPhotoName;
$albumPhoto = '/albumPhoto/'.$albumPhotoName;
move_uploaded_file($albumPhoto_temp, $albumPhotoPath);

$sql = "UPDATE MUSIC SET music_photo = ? WHERE music_id = ? ";

$statement = $pdo->prepare($sql);
$statement -> bindValue(1, $albumPhoto);
$statement -> bindValue(2, $musicId);
$statement -> execute();

?>