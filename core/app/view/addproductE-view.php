<?php


if(count($_POST)>0){
  $product = new ProductData();
  //$product->part_number = $_POST["part_number"];
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
   $location_id="NULL";
  if($_POST["location_id"]!=""){ $location_id=$_POST["location_id"];}
  

  $product->category_id=$category_id;
  $product->estatusR_id=$estatusR_id;
  $product->estatusP_id=$estatusP_id;
  $product->location_id=$location_id;
  $product->user_id = $_SESSION["user_id"];
 
  
  //$product->user_id = $_SESSION["user_id"];


  if(isset($_FILES["image"])){
    $image = new Upload($_FILES["image"]);
    if($image->uploaded){
      $image->Process("storage/products/");
      if($image->processed){
        $product->image = $image->file_dst_name;
        $prod = $product->add_with_image2();
      }
    }else{

  $prod= $product->add2();
    }
  }
  else{
  $prod= $product->add2();

  }
/*
if($_POST["q"]!="" || $_POST["q"]!="0"){
 $op = new OperationData();
 $op->product_id = $prod[1] ;
 $op->operation_type_id=OperationTypeData::getByName("entrada")->id;
 $op->q= $_POST["q"];
 $op->sell_id="NULL";
$op->is_oficial=1;
$op->add();
}
*/
print "<script>window.location='index.php?view=products';</script>";


}


?>