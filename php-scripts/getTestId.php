<?php

require("dbconnect.php");

    $getTestId = $dbh->prepare("SELECT MAX(sample_id) as sample_id  FROM samples");
    $data_samples = array();
    if ($getTestId->execute()) {
        foreach ($getTestId->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_samples["samples"][] = $metadata;
        }
        echo json_encode($data_samples);
    } else {
        echo 0;
    }
    