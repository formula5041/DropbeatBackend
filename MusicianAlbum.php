<?php 
include('./Connection.php');

$id = htmlspecialchars($_POST['id']);

$albumSql = "SELECT e.album_id, 
                    IFNULL(d.totaltime, 0) AS totalTime, 
                    e.album_photo AS albumImg, 
                    year(setup_date) AS albumYear,
                    e.album_name, 
                    e.publish, 
                    IFNULL(d.num, 0) AS musicAmount 
                    FROM ALBUM e
            LEFT JOIN (
                        SELECT musician,
                               album,
                               SUM(music_long) AS totaltime, 
                               COUNT(music_id) AS num 
                               FROM MUSIC
                        WHERE  NOT album IS NULL
                        GROUP BY musician, album
                        HAVING musician = ?
                       ) d
           ON e.album_id = d.album
           WHERE e.musician = ?";
           
$albumStatement = $pdo -> prepare($albumSql);
$albumStatement -> bindValue(1, $id);
$albumStatement -> bindValue(2, $id);
$albumStatement -> execute();
$albumData = $albumStatement -> fetchAll();

echo json_encode($albumData)
?>