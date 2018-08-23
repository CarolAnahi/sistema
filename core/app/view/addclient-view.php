<?php

if(count($_POST)>0){
	$user = new PersonData();
	$user->name = $_POST["name"];
	$user->address1 = $_POST["address1"];
	$user->add_client();

print "<script>window.location='index.php?view=clients';</script>";


}


?>