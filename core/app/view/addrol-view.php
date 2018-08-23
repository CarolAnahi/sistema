<?php

if(count($_POST)>0){
	$user = new RolData();
	$user->abb = $_POST["abb"];
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	$user->add();

print "<script>window.location='index.php?view=rol';</script>";


}


?>