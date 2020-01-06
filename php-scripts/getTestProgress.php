<?php

require("dbconnect.php");

    $position = $dbh->prepare("SELECT num FROM temp_progress");
    $data_isolatename = array();
    if ($position->execute()) {
        foreach ($position->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_isolatename["position"][] = $metadata;
        }
        echo json_encode($data_isolatename);
    } else {
        echo 0;
    }



