  <?php

if(count($_POST)>0){
	$user = new EstatusPData();
	$user->nameP = $_POST["nameP"];
	$user->description = $_POST["description"];
	$user->add();

print "<script>window.location='index.php?view=StateP';</script>";


}


?>