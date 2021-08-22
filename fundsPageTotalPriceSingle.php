<?php
    include('./Connection.php');

    $donate_id = ($_POST["donate_id"]);

    $sql = "SELECT e.donate_id, sum(d.total_price) as total_price , count(d.total_price) as donate_num
            FROM dropbeat.DONATE e
                join dropbeat.DONATEDETAIL d
                on e.donate_id = d.donate
                where e.donate_id = $donate_id
                group by d.donate";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();

    $result = empty($data);
    if ($result == 1) {
        echo $result;
    } else {
        echo json_encode($data);
    }
?>