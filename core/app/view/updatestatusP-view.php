<?php

if(count($_POST)>0){
	$user = EstatusPData::getById($_POST["user_id"]);
	$user->nameP = $_POST["nameP"];
	$user->description = $_POST["description"];
	$user->update();


print "<script>window.location='index.php?view=StateP';</script>";


}


?>