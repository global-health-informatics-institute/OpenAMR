<?php

require("dbconnect.php");

    $getAntibioticsToProcess = $dbh->prepare("SELECT a.abx_code from antibiotics a inner JOIN discs d inner join samples s on d.abx_id = a.abx_id and s.sample_id = d.sample_id where  s.sample_id = ". $_REQUEST["sample_id"] );
    $data_abx_name = array();
    if ($getAntibioticsToProcess->execute()) {
        foreach ($getAntibioticsToProcess->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_abx_name["abx_name_obj"][] = $metadata;
        }
        echo json_encode($data_abx_name);
    } else {
        echo 0;
    }



