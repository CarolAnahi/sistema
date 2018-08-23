 <?php

if(count($_POST)>0){
	$user = new EstatusRData();
	$user->nameE = $_POST["nameE"];
	$user->description = $_POST["description"];
	$user->add();

print "<script>window.location='index.php?view=StateR';</script>";


}


?>