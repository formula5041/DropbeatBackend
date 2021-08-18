<?php 
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);

$ServerRoot = $_SERVER['DOCUMENT_ROOT'];
  

if($_FILES['img']['error'] > 0){
  echo '上傳失敗';
}else{
  $albumPhotoName = $_FILES['img']['name'];
  $albumPhoto_temp = $_FILES['img']['tmp_name'];
  $albumPhotoType = $_FILES['img']['type'];
  $albumPhotoSize = $_FILES['img']['size'];
}
$albumPhotoPath = $ServerRoot.'/DropBeat/public/artist/'.$albumPhotoName;
$albumPhoto = '/artist/'.$albumPhotoName;
move_uploaded_file($albumPhoto_temp, $albumPhotoPath);

$sql = "UPDATE MUSICIAN SET musicial_photo = ? WHERE musician_id = ? ";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $albumPhoto);
$statement -> bindValue(2, $id);
$statement -> execute();


?>