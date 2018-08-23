<?php

if(count($_POST)>0){
	$user = new UserData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->ci = $_POST["ci"];
	$user->username = $_POST["username"];
	$user->password = sha1(md5($_POST["password"]));

	$city_id="NULL";
	if($_POST["city_id"]!=""){$city_id=$_POST["city_id"];}
	$user->city_id=$city_id;
	
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>