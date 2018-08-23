<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcity" class="btn btn-default"><i class='fa fa-plus-square'></i> Nuevo Registro de Ciudad</a>
 
</div>
		<h1>Lista de Ciudades</h1>

<br>
		<?php

		$users = CityData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
				<th>Codigo</th>
				<th>Abreviatura de la Ciudad</th>
				<th>Nombre de la Ciudad</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->abb; ?></td>
					<td><?php echo $user->name; ?></td>
					<td style="width:130px;">
				<a href="index.php?view=editcity&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delcity&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Ciudades registradas</p>";
		}


		?>
</table>

	</div>
</div>