<?php

require("dbconnect.php");

    $SQL = $dbh->prepare("SELECT ba.bacteria_id, sa.uniquecode, ba.bacteria_name FROM samples sa inner join
 bacteria ba on sa.bacteria_id  = ba.bacteria_id where sa.sample_id= ". $_REQUEST["sample_id"]);
    $data_samples = array();
    if ($SQL->execute()) {
        foreach ($SQL->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_samples["samples"][] = $metadata;
        }
        echo json_encode($data_samples);
    } else {
        echo 0;
    }
    