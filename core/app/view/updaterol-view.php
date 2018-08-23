<?php

if(count($_POST)>0){
	$user = RolData::getById($_POST["user_id"]);
	$user->name = $_POST["abb"];
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	
	$user->update();


print "<script>window.location='index.php?view=rol';</script>";


}


?>