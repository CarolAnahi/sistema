<?php

if(count($_POST)>0){
	$user = new CityData();
	$user->abb = $_POST["abb"];
	$user->name = $_POST["name"];
	$user->add();

print "<script>window.location='index.php?view=city';</script>";


}


?>