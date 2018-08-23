<?php

$city = RolData::getById($_GET["id"]);
$city->del();
Core::redir("./index.php?view=rol");

?>