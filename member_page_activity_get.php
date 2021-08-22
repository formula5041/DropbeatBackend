<?php
    include('./Connection.php');

    $memberId = ($_POST["member_id"]);

    $sql = "SELECT a.account, d.*
            from member a join (select e.*, d.member as joinMan 
                                from ACTIVITY e 
                                    left join ACTIVITYDETAIL d
                                    on e.activity_id = d.activity) d
                                    on a.member_id = d.initiator
                                    where d.joinMan = $memberId;";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);

?>