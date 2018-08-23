 <div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newstatusP" class="btn btn-default"><i class='fa fa-user'></i> Nuevo Estado</a>

</div>
		<h1>Directorio de Estados de Producto</h1>
		<div class="clearfix"></div>
<br>
		<?php

		$users = EstatusPData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre del Estado</th>
			<th>Descripcion</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->nameP; ?></td>
				<td><?php echo $user->description; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editstatusP&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delstatusP&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}


		?>

</table>
	</div>
</div>