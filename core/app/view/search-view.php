
<?php
	if(isset($_GET["buscar"])):
		#if numero 2
$products = ProductData::getLike($_GET["product"]);
#if numero 3
if(count($products)>0){
	?>
	<h1>Lista de Productos</h1>
	<br>
	<td><div class="row">
		<div class="col-md-3">
			<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products"?>">Volver <i class="glyphicon glyphicon-chevron-left"></i></a>
			</div>
			</div>
		</td>

			<br><br>
	<table class="table table-bordered table-hover">
		<thead>
		<th>Codigo</th>
		<th>Imagen</th>
		<th>Nombre</th>
		<th>Numero de Parte</th>
		<th>Linea de Negocio</th>
		<th>Tipo de Producto</th>
		<th>Estado del Producto</th>
		<th>Estado del Registro</th>
		<th>Ubicacion Tecnica</th>
	</thead>
	<?php
	 foreach($products as $product):
	?>
		<form method="post">
	<tr>
		<td style="width:80px;"><?php echo $product->id; ?></td>
		<td>
			<?php if($product->image!=""):?>
				<img src="storage/products/<?php echo $product->image;?>" style="width:64px;">
			<?php endif;?>
		</td>
		<td><?php echo $product->name; ?></td>
		<td><?php echo $product->part_number; ?></td>
		<td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php echo $product->tipe_prod; ?></td>
		<td><?php if($product->estatusP_id!=null){echo $product->getEstatusP()->nameP;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php if($product->estatusR_id!=null){echo $product->getEstatusR()->nameE;}else{ echo "<center>----</center>"; }  ?></td>
		<td><?php echo $product->technicallocation; ?></td>
		<td style="width:70px;">
		<?php if($product->tipe_prod="Insumo"):?>
			<a href="index.php?view=editproductI&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
			<?php else:?> 
				<a href="index.php?view=editproductE&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
				<?php endif;?>	
		<a href="index.php?view=delproduct&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	</form>
	<?php endforeach;?>
</table>
	<?php } 
	#if numero 3
	?>
<br><hr>
<hr><br>


<?php endif; ?>
