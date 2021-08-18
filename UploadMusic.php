<?php 
  include('./Connection.php');

  $ServerRoot = $_SERVER['DOCUMENT_ROOT'];
  

  if($_FILES['albumPhoto']['error'] > 0){
    echo '上傳失敗';
  }else{
    $albumPhotoName = $_FILES['albumPhoto']['name'];
    $albumPhoto_temp = $_FILES['albumPhoto']['tmp_name'];
    $albumPhotoType = $_FILES['albumPhoto']['type'];
    $albumPhotoSize = $_FILES['albumPhoto']['size'];
  }
  $albumPhotoPath = $ServerRoot.'/DropBeat/public/albumPhoto/'.$albumPhotoName;
  $albumPhoto = '/albumPhoto/'.$albumPhotoName;

  move_uploaded_file($albumPhoto_temp, $albumPhotoPath);

  if($_FILES['musicFile']['error'] > 0){
    echo '上傳失敗';
  }else{
    $musicFileName = $_FILES['musicFile']['name'];
    $musicFile_temp = $_FILES['musicFile']['tmp_name'];
    $musicFileType = $_FILES['musicFile']['type'];
    $musicFileSize = $_FILES['musicFile']['size'];
  }
  $musicFilePath = $ServerRoot.'/DropBeat/public/musicFile/'.$musicFileName;
  $musicFile = '/musicFile/'.$musicFileName;

  move_uploaded_file($musicFile_temp, $musicFilePath);

  $title = htmlspecialchars($_POST["title"]);
  $memberId = htmlspecialchars($_POST['member']);
  $setTime = htmlspecialchars($_POST["setTime"]);
  $type = htmlspecialchars($_POST["type"]);
  $lyrics = htmlspecialchars($_POST["lyrics"]);
  $durationMusic = htmlspecialchars($_POST['duration']);
  $publish = htmlspecialchars($_POST['publish']);



  $musicTypeSql = "SELECT musictype_id FROM MUSICTYPE WHERE type_name = ?";

  $musictypeIdState = $pdo -> prepare($musicTypeSql);
  $musictypeIdState -> bindValue(1, $type);
  $musictypeIdState -> execute();
  $musictypeId = $musictypeIdState -> fetch();
  
$sql = "INSERT INTO MUSIC(music_name, musician, music_type, setup_date, music_photo, music_data, lyrics, music_long, publish, alter_date, remove) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 0)";

 $statement = $pdo->prepare($sql);
 $statement -> bindValue(1, $title);
 $statement -> bindValue(2, $memberId);
 $statement -> bindValue(3, $musictypeId[0]);
 $statement -> bindValue(4, $setTime);
 $statement -> bindValue(5, $albumPhoto);
 $statement -> bindValue(6, $musicFile);
 $statement -> bindValue(7, $lyrics);
 $statement -> bindValue(8, $durationMusic);
 $statement -> bindValue(9, $publish);
 $statement -> execute();

?>