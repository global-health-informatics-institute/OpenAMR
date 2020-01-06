<?php

require("dbconnect.php");

$insertTestData = $dbh->prepare("INSERT INTO samples (uniquecode,bacteria_id,test_on) VALUES ( ? ,(SELECT bacteria_id FROM bacteria WHERE bacteria_name= ?) , NOW())");
if ($insertTestData->execute(array($_REQUEST["uniquecode"], $_REQUEST["isolatename"]))) {
    $getdiscsId = $dbh->prepare("SELECT  sample_id  FROM samples  WHERE uniquecode = ? ORDER BY sample_id DESC LIMIT 1");
    if ($getdiscsId->execute(array($_REQUEST["uniquecode"]))) {
        foreach ($getdiscsId->fetchAll(PDO::FETCH_OBJ) as $metadata) {
            $deLdiscs = $dbh->prepare("DELETE FROM discs WHERE sample_id = ?");
            $sample_id = $metadata->sample_id;
            $count = 0;
            if ($deLdiscs->execute(array($sample_id))) {
                $tempvals = array();
                foreach (explode('"', $_POST["abx_discs"]) as $values) {
                    $tempvals[] = $values;
                }$sortedvals = array();
                for ($i = 0; $i < count($tempvals); $i++) {
                    if ($i % 2 == 1)
                        $sortedvals[] = $tempvals[$i];
                }$insertTestDiscs = $dbh->prepare("INSERT INTO discs (abx_id, sample_id, test_on) VALUES ((SELECT abx_id FROM antibiotics WHERE abx_code = ? ), (SELECT  sample_id 
                 FROM samples  WHERE uniquecode = ? ORDER BY sample_id DESC LIMIT 1), NOW())");
                for ($i = 0; $i < count($sortedvals); $i++) {
                    if ($insertTestDiscs->execute(array($sortedvals[$i], $_REQUEST["uniquecode"])))
                        $count ++;
                }
                if ($count == sizeof($sortedvals))
                    echo(1);
                else {
                    $myId = $dbh->lastInsertId();
                    $delSample = $dbh->prepare("DELETE from  samples  WHERE sample_id = ? ");
                    if ($delSample->execute(array($myId)))
                        echo 1;
                    else
                        echo(0);
                }
            }
        }
    }
} else {
    echo(0);
}

    