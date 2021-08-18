<?php 
include('./Connection.php');

$allMusicId = htmlspecialchars($_POST['allMusicId']);
$AllMusicIdArr = explode(',' , $allMusicId);

foreach($AllMusicIdArr as $index => $value){
   $resetAlbum = "UPDATE MUSIC SET album = NULL WHERE music_id = $value";
   $resetAlbumStatement = $pdo -> prepare($resetAlbum);
   $resetAlbumStatement -> execute(); 
}

$albumTitle = htmlspecialchars($_POST['albumName']);
$albumDate = htmlspecialchars($_POST['albumDate']);
$albumPublish = htmlspecialchars($_POST['publish']);
$albumId = htmlspecialchars($_POST['albumId']);

$musicId = htmlspecialchars($_POST['musicId']);
$musicIdArr = explode(',', $musicId);

$sql = "UPDATE ALBUM SET album_name = ?, publish = ?, setup_date = ?, alte_rdate = NOW() WHERE album_id = ?";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $albumTitle);
$statement -> bindValue(2, $albumPublish);
$statement -> bindValue(3, $albumDate);
$statement -> bindValue(4, $albumId);
$statement -> execute();

foreach($musicIdArr as $index => $value){
  $setAlbumInMusic = "UPDATE MUSIC SET album = ? WHERE music_id = $value";
  $setAlbumINMUsicStatement = $pdo -> prepare($setAlbumInMusic);
  $setAlbumINMUsicStatement -> bindValue(1, $albumId);
  $setAlbumINMUsicStatement -> execute();
}

?>