<div class="row">
	<div class="col-md-12">
		
		<h1>Lista de Productos</h1>
		<div class="clearfix"></div>
<form>
		<div class="row">
			<div class="col-md-3">
				<input type="hidden" name="view" value="search">
				<input type="text" name="product" class="form-control" placeholder="Busque un Producto">
			</div>
			<div class="col-md-3">
			<button name=buscar type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
</form>

<!-- ////////////////////////////////////////////////////////-->

<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$products = ProductData::getAll();
if(count($products)>0){

if($page==1){
$curr_products = ProductData::getAllByPage($products[0]->id,$limit);
}else{
$curr_products = ProductData::getAllByPage($products[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($products)/$limit);
 $spaginas = count($products)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>No</th>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>No de Parte</th>
		<!-- <th>Linea de Negocio</th>-->
		<th>Tipo de Producto</th>
		<th>Estado del Producto</th>
		<th>Estado del Registro</th>
		<th>Ubicacion Tecnica</th>
		<th></th>
	</thead>
	<?php foreach($curr_products as $product):?>
	<tr>
		<td><?php echo $product->id; ?></td>
		<td>
			<?php if($product->image!=""):?>
				<img src="storage/products/<?php echo $product->image;?>" style="width:64px;">
			<?php endif;?>
		</td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->part_number; ?></td>
		<!-- <td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>-->
		<td><?php echo $product->tipe_prod; ?></td>
		<td><?php if($product->estatusP_id!=null){echo $product->getEstatusP()->nameP;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php if($product->estatusR_id!=null){echo $product->getEstatusR()->nameE;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php if($product->location_id!=null){echo $product->getlocation()->name;}else{ echo "<center>----</center>"; }  ?></td>
		
		<td style="width:70px;">
		<?php if($product->tipe_prod!="Equipo"):?>
			<a href="index.php?view=editproductI&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
			<?php elseif($product->tipe_prod="Equipo"):?> 
				<a href="index.php?view=editproductE&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
				<?php endif;?>	
		<a href="index.php?view=delproduct&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){

	echo "<a href='index.php?view=products&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
<!-- <td><?php echo " Pagina";?></td> -->

</div>
<!--
<form class="form-inline">
	<label for="limit">Limite</label>
	<input type="hidden" name="view" value="products">
	<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
</form>
-->
<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>



		
