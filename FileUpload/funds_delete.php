<?php
    include('../Connection.php');

    // DONATE
    $donate = htmlspecialchars($_POST["donate"]);

    $sql= "DELETE from DONATEOPTION where donate = ?";
    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $donate);
    $statement -> execute();

    $sql= "DELETE from DONATE where donate_id = ?";
    $statement = $pdo ->prepare($sql);
    $statement -> bindValue(1, $donate);
    $statement -> execute();
  
?>