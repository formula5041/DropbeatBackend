<?php 
include('./Connection.php');
$type = htmlspecialchars($_POST['range']);
if($type == '最新歌曲'){
$sql = "SELECT e.type_name, d.* FROM MUSICTYPE e
JOIN ( SELECT a.musician_name, d.* 
FROM MUSICIAN a
JOIN ( 
     SELECT e.*, IFNULL(d.likenum, 0) AS likeNum 
     FROM MUSIC e 
     LEFT JOIN (
                 SELECT COUNT(music) AS likenum, music 
                 FROM dropbeat.LIKE 
                 GROUP BY music) d
     ON e.music_id = d.music) d
ON a.musician_id = d.musician
WHERE d.publish = 1 AND d.remove = 0) d
ON e.musictype_id = d.music_type
ORDER BY d.setup_date desc";
} else if ($type == '最多播放') {
  $sql = "SELECT e.type_name, d.*, d.play_num FROM MUSICTYPE e
  JOIN ( SELECT a.musician_name, d.* 
  FROM MUSICIAN a
  JOIN ( 
       SELECT e.*, IFNULL(d.likenum, 0) AS likeNum 
       FROM MUSIC e 
       LEFT JOIN (
                   SELECT COUNT(music) AS likenum, music 
                   FROM dropbeat.LIKE 
                   GROUP BY music) d
       ON e.music_id = d.music) d
  ON a.musician_id = d.musician
  WHERE d.publish = 1 AND d.remove = 0) d
  ON e.musictype_id = d.music_type
  ORDER BY d.play_num desc";
} else {
    $sql="SELECT e.type_name, d.* FROM MUSICTYPE e
    JOIN ( SELECT a.musician_name, d.* 
    FROM MUSICIAN a
    JOIN ( 
         SELECT e.*, IFNULL(d.likenum, 0) AS likeNum 
         FROM MUSIC e 
         LEFT JOIN (
                     SELECT COUNT(music) AS likenum, music 
                     FROM dropbeat.LIKE 
                     GROUP BY music) d
         ON e.music_id = d.music) d
    ON a.musician_id = d.musician
    WHERE d.publish = 1 AND d.remove = 0
    ) d
    ON e.musictype_id = d.music_type
    ORDER BY d.likeNum desc";
}

$statement = $pdo -> prepare($sql);
$statement -> execute();
$data = $statement -> fetchAll();

echo json_encode($data);

?>