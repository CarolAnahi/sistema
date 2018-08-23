<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcontac" class="btn btn-default"><i class='fa fa-plus-square'></i> Nuevo Contacto</a>

</div>
		<h1>Directorio de Contactos</h1>
<br>
		<?php

		$users = ContacData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre Completo</th>
			<th>Celular</th>
			<th>Empresa</th>
			<th>Ciudad</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->cellphone; ?></td>
				<td><?php if($user->client_id!=null){echo $user->getClient()->name;}else{ echo "<center>----</center>"; }  ?></td>
				<td><?php if($user->city_id!=null){echo $user->getCity()->name;}else{ echo "<center>----</center>"; }  ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editcontac&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delcontac&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Contactos</p>";
		}


		?>
</table>

	</div>
</div>