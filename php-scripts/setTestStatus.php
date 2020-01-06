<?php



require("dbconnect.php");
if(isset($_POST["prog"]))
$tsetTestStatus = $dbh->prepare("UPDATE teststatus  set prog= ".$_REQUEST["prog"]);

else
    $tsetTestStatus = $dbh->prepare("UPDATE teststatus  set status= ".$_REQUEST["status"]);

    if ($tsetTestStatus->execute()) {

        echo 1;

    } else {

        echo 0;

    }

