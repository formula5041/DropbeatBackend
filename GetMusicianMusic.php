<?php
include('./Connection.php');
$id = htmlspecialchars($_POST['id']);

$sql = "SELECT e.type_name, d.*, d.play_num FROM MUSICTYPE e
JOIN ( SELECT a.musician_name, d.* 
FROM MUSICIAN a
JOIN ( 
     SELECT e.*, IFNULL(d.likenum, 0) AS likeNum 
     FROM MUSIC e 
     LEFT JOIN (
                 SELECT COUNT(music) AS likenum, music 
                 FROM tibamefe_tfd102g1.LIKE 
                 GROUP BY music) d
     ON e.music_id = d.music) d
ON a.musician_id = d.musician
WHERE d.publish = 1 AND d.remove = 0) d
ON e.musictype_id = d.music_type
WHERE d.musician = ?
ORDER BY d.play_num desc";

$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> execute();
$data = $statement -> fetchAll();

echo json_encode($data);
?>