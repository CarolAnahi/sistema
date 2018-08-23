<?php

if(count($_POST)>0){
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->ci = $_POST["ci"];
	$user->username = $_POST["username"];
	

	$city_id="NULL";
	if($_POST["city_id"]!=""){$city_id=$_POST["city_id"];}
	$user->city_id=$city_id;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>