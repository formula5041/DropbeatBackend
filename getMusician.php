<?php 
include('./Connection.php');
$id = htmlspecialchars($_POST['id']);

$sql = "SELECT * FROM  (SELECT COUNT(*) as followNum FROM FOLLOW WHERE musican = ?) e join ( SELECT e.musician_id,
e.musician_name,
e.musicial_photo, 
e.info, 
d.num 
FROM musician e
JOIN ( SELECT COUNT(*) AS num,
              musician 
       FROM music 
       WHERE musician = ?
             and 
             publish = 1 ) d
WHERE musician_id = ?) d";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> bindValue(2, $id);
$statement -> bindValue(3, $id);
$statement -> execute();
$data = $statement -> fetch();

echo json_encode($data);

?>