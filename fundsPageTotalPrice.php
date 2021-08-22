<?php
    include('./Connection.php');
    
    $sql = "SELECT e.donate_id, sum(d.total_price) as total_price, count(d.total_price) as donate_num FROM DONATE e
    join DONATEDETAIL d
        on e.donate_id = d.donate
        group by d.donate";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);
?>