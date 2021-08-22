<?php
    include('./Connection.php');

    $memberId = ($_POST["member_id"]);

    $sql = "SELECT dd.*, d.* 
            from DONATEDETAIL dd 
            join (select 
                    donate_id,
                    m.account as initiator,
                    donate_name,
                    info,
                    goal,
                    d.setup_date,
                    end_date,
                    donate_photo
            from DONATE d join MEMBER m on d.initiator=m.member_id) d on dd.donate=d.donate_id 
            join MEMBER m on dd.member=m.member_id 
            join DONATEOPTION dop on dd.donate_option=dop.donate_option_id
            where dd.member = $memberId";

    $statement = $pdo->query($sql);
    $data = $statement->fetchAll();
    
    echo json_encode($data);

?>