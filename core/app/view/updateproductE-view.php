<?php

if(count($_POST)>0){
	$product = ProductData::getById($_POST["product_id"]);

	
	$product->name = $_POST["name"];
	$product->brand = $_POST["brand"];
	$product->description = $_POST["description"];
	$product->model = $_POST["model"];
	$product->serial = $_POST["serial"];
  	$product->tipe_prod = $_POST["tipe_prod"];
//$product->inventary_min = $_POST["inventary_min"];

	$category_id="NULL";
  	if($_POST["category_id"]!=""){ $category_id=$_POST["category_id"];}
  	$estatusR_id="NULL";
    if($_POST["estatusR_id"]!=""){ $estatusR_id=$_POST["estatusR_id"];}
    $estatusP_id="NULL";
    if($_POST["estatusP_id"]!=""){ $estatusP_id=$_POST["estatusP_id"];}
    $estatusP_id="NULL";
    if($_POST["location_id"]!=""){ $location_id=$_POST["location_id"];}

  	$product->category_id=$category_id;
    $product->estatusR_id=$estatusR_id;
    $product->estatusP_id=$estatusP_id;
    $product->location_id=$location_id;

	
	$product->updateE();

	if(isset($_FILES["image"])){
		$image = new Upload($_FILES["image"]);
		if($image->uploaded){
			$image->Process("storage/products/");
			if($image->processed){
				$product->image = $image->file_dst_name;
				$product->update_image2();
			}
		}
	}

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editproductE&id=$_POST[product_id]';</script>";


}


?>