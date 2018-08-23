<?php $user = RolData::getById($_GET["id"]);

?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Rol</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updaterol" role="form">

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Abreviacion del Rol*</label>
    <div class="col-md-6">
      <input type="text" name="abb" value="<?php echo $user->abb;?>" class="form-control" id="abb" placeholder="Abrev. Ej. ADM ">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre de la Ciudad">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-md-6">
      <input type="text" name="description" value="<?php echo $user->description;?>" class="form-control" id="description" placeholder="Descripcion">
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Rol</button>
    </div>
  </div>
</form>
	</div>
</div>