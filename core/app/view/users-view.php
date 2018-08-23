<div class="row">
	<div class="col-md-12">
	<a href="index.php?view=newuser" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
		<h1>Lista de Usuarios</h1>
<br>
		
		<?php
		
		$rols= UserRolData::getAll();
		$users = UserData::getAll();
		if(count($users)>0 && count($rols)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>ci</th>
			<th>Nombre de usuario</th>
			<th>Ciudad</th>
			<th>Rol</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				foreach ($rols as $rol) {
					?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->ci; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php if($user->ciudad_id!=null){echo $user->getCity()->name;}else{ echo "<center>----</center>"; }  ?></td>
				<td><?php if($rol->rol_id!=null){echo $rol->getRol()->name;}else{ echo "<center>----</center>"; }  ?></td>
				<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php
				}
			}
 echo "</table>";


		}else{
			// no hay usuarios
		}


		?>


	</div>
</div>