    <?php

require("dbconnect.php");


    $getdiscsId = $dbh->prepare("SELECT  sample_id  FROM samples  WHERE uniquecode = ? ORDER BY sample_id DESC LIMIT 1" );
    $data_getdiscsId = array();
    if ($getdiscsId->execute(array($_REQUEST["uniquecode"]))) {
        foreach ($getdiscsId->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $data_getdiscsId["idcalled"][] = $metadata;
        }
        echo json_encode($data_getdiscsId);
    } else {
        echo 0;
    }



