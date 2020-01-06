<?php
require("dbconnect.php"); if ($dbh->prepare("UPDATE ping_pi SET ping_state= ? WHERE ping_id=1")->execute(array($_POST["ping_state"])))  echo 1;    else   echo 0;
    
