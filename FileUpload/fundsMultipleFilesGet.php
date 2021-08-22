<?php
    include('../Connection.php');

    $donate = htmlspecialchars($_POST["donate"]);

    $sql = "SELECT * FROM DONATEOPTION where donate = ? ";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $_POST["donate"]);
    $statement->execute();
    $data = $statement->fetchAll();

    echo json_encode($data);
?>