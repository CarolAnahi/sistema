<?php

$client = EstatusPData::getById($_GET["id"]);
$client->del();
Core::redir("./index.php?view=StateP");

?>