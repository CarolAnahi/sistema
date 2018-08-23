<?php

$client = LocationData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=location");

?>