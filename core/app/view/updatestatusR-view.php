<?php

if(count($_POST)>0){
	$user = EstatusRData::getById($_POST["user_id"]);
	$user->nameE = $_POST["nameE"];
	$user->description = $_POST["description"];
	$user->update();


print "<script>window.location='index.php?view=StateR';</script>";


}


?>