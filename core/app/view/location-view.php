 <div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newlocation" class="btn btn-default"><i class='fa fa-user'></i> Nueva Ubicacion Tecnica</a>

</div>
		<h1>Ubicaciones Técnicas</h1>
		<div class="clearfix"></div>
<br>
		<?php

		$users = LocationData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nro</th>
			<th>Ubicacion Tecnica</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->id; ?></td>
				<td><?php echo $user->name; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editlocation&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=dellocation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Ubicaciones Tecnicas</p>";
		}


		?>

</table>
	</div>
</div>