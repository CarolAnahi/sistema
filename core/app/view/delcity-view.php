<?php

$city = CityData::getById($_GET["id"]);
$city->del();
Core::redir("./index.php?view=city");

?>