<?php

require("dbconnect.php");

    $getCDiscs = $dbh->prepare("(select * from eucast where abx_id = ? and bacteria_id = ?) union (select 0,0,0,0,0);
" );
    $data_isolatename = array();
    if ($getCDiscs->execute(array($_REQUEST["abx_id"],$_REQUEST["bacteria_id"]))) {
        foreach ($getCDiscs->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["association"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }



