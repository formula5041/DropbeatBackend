<?php 
include('./Connection.php');
$id = htmlspecialchars($_POST['id']);

$sql = "SELECT e.musician_id,
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
               ON e.musician_id = d.musician
        WHERE musician_id = ?";
$statement = $pdo -> prepare($sql);
$statement -> bindValue(1, $id);
$statement -> bindValue(2, $id);
$statement -> execute();
$data = $statement -> fetch();

echo json_encode($data);

?>