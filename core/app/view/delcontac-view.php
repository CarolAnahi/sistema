<?php

$contac = ContacData::getById($_GET["id"]);
$contac->del();
Core::redir("./index.php?view=contac");

?>