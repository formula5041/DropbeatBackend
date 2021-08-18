<?php
include('./Connection.php');

$id = htmlspecialchars($_POST['albumId']);

$sql = 'SELECT e.album_id,
e.album_name, 
e.album_photo, 
e.setup_date,  
e.musician, 
d.music_id, 
d.music_photo, 
d.album,
d.music_name
FROM ALBUM e
JOIN MUSIC d 
ON e.musician = d.musician
WHERE e.album_id = ? AND d.publish = 1 AND (d.album = ? OR d.album IS NULL)';

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> bindValue(2, $id);
$statement -> execute();

$data = $statement -> fetchAll();
echo json_encode($data);
?>