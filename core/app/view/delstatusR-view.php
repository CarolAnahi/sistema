<?php

$client = EstatusRData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=StateR");

?>