 <div class="row">
	<div class="col-md-12">
	<h1>Nuevo Registro de Ciudad</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addcity" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Abreviacion de la Ciudad*</label>
    <div class="col-md-6">
      <input type="text" name="abb" class="form-control" id="abb" placeholder="Abrev. Ej. LPZ">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la Ciudad*</label>
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de la Ciudad">
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