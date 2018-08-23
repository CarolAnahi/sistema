<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newrol" class="btn btn-default"><i class='fa fa-plus-square'></i> Nuevo Registro de Rol</a>
 
</div>
		<h1>Lista de Roles</h1>

<br>
		<?php

		$users = RolData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
				<th>Nro</th>
				<th>Abrev.</th>
				<th>Nombre</th>
				<th>Descripcion</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->abb; ?></td>
					<td><?php echo $user->name; ?></td>
					<td><?php echo $user->description; ?></td>
					<td style="width:130px;">
				<a href="index.php?view=editrol&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delrol&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Roles registrados</p>";
		}


		?>
</table>

	</div>
</div>