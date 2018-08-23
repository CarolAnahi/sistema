<?php $user = CityData::getById($_GET["id"]);

?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Ciudad</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecity" role="form">

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Abreviacion de Ciudad*</label>
    <div class="col-md-6">
      <input type="text" name="abb" value="<?php echo $user->abb;?>" class="form-control" id="abb" placeholder="Abrev. Ej. LPZ ">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre de la Ciudad">
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Contacto</button>
    </div>
  </div>
</form>
	</div>
</div>