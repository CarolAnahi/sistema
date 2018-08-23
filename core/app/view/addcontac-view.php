 <?php

if(count($_POST)>0){
	$user = new ContacData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->cellphone = $_POST["cellphone"];

	$client_id="NULL";
	if($_POST["client_id"]!=""){$client_id=$_POST["client_id"];}
	$city_id="NULL";
	if($_POST["city_id"]!=""){$city_id=$_POST["city_id"];}

	$user->client_id=$client_id;
	$user->city_id=$city_id;
	$user->add();

print "<script>window.location='index.php?view=contac';</script>";


}


?>