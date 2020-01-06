<?php

require("dbconnect.php");


    $getDiscId = $dbh->prepare("SELECT disc_id  FROM discs WHERE sample_id ='" . $_REQUEST["sample_id"] . "'");
    $data_discs = array();
    if ($getDiscId->execute()) {
        foreach ($getDiscId->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_discs["discs"][] = $metadata;
        }
        echo json_encode($data_discs);
    } else {
        echo 0;
    }