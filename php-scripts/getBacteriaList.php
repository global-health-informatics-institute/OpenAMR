<?php

require("dbconnect.php");


    $getBacteriaList = $dbh->prepare("SELECT * FROM bacteria");
    $data_bacteria = array();
    if ($getBacteriaList->execute()) {
        foreach ($getBacteriaList->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_bacteria["bacteria"][] = $metadata;
        }
        echo json_encode($data_bacteria);
    } else {
        echo 0;
    }
