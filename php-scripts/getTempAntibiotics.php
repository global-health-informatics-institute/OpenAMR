<?php

require("dbconnect.php");

    $getTempAntibiotics = $dbh->prepare("SELECT abx_name from temp_abx");
    $data_abx_name = array();
    if ($getTempAntibiotics->execute()) {
        foreach ($getTempAntibiotics->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_abx_name["temp_abx"][] = $metadata;
        }
        echo json_encode($data_abx_name);
    } else {
        echo 0;
    }



