<?php

require("dbconnect.php");

    $getCDiscs = $dbh->prepare("select * from discs join antibiotics join samples 
 on antibiotics.abx_id = discs.abx_id  and samples.sample_id= discs.sample_id where
 discs.sample_id = ?" );
    $data_isolatename = array();
    if ($getCDiscs->execute(array($_REQUEST["sample_id"]))) {
        foreach ($getCDiscs->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["discId_num"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }



