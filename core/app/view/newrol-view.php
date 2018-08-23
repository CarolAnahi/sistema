 <div class="row">
	<div class="col-md-12">
	<h1>Nuevo Registro de Rol</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addrol" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Abreviacion del Rol*</label>
    <div class="col-md-6">
      <input type="text" name="abb" class="form-control" id="abb" placeholder="Abrev. Ej. ADM">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del rol*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del Rol">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <input type="text" name="description" class="form-control" id="description" placeholder="Descripcion">
    </div>
  </div>
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Ciudad</button>
    </div>
  </div>
</form>
	</div>
</div>