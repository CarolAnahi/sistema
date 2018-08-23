<?php

if(count($_POST)>0){
	$user = CityData::getById($_POST["user_id"]);
	$user->abb = $_POST["abb"];
	$user->name = $_POST["name"];
	
	$user->update();


print "<script>window.location='index.php?view=city';</script>";


}


?>