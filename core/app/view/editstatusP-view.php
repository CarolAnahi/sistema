<?php $user = EstatusPData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Estado de Registro</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatestatusP" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nameP" value="<?php echo $user->nameP;?>" class="form-control" id="nameP" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <input type="text" name="description" value="<?php echo $user->description;?>" class="form-control" required id="description" >
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Registro</button>
    </div>
  </div>
</form>
	</div>
</div>