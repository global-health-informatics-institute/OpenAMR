<?php

require("dbconnect.php");


    $getCompletedTestResults = $dbh->prepare("SELECT * FROM samples sa INNER JOIN discs ds 
INNER JOIN antibiotics an INNER JOIN eucast eu inner join bacteria b on 
ds.abx_id = an.abx_id and sa.sample_id=ds.sample_id and eu.abx_id=an.abx_id and 
eu.bacteria_id = b.bacteria_id where sa.sample_id= ? and b.bacteria_id = ? ORDER BY ds.disc_id");
    $data_samples = array();
    if ($getCompletedTestResults->execute(array($_REQUEST["sample_id"], $_REQUEST["bacteria_id"]))) {
        foreach ($getCompletedTestResults->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_samples["samples"][] = $metadata;
        }
        echo json_encode($data_samples);
    } else {
        echo 0;
    }
    
