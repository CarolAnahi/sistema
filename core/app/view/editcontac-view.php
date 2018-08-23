<?php $user = ContacData::getById($_GET["id"]);
$clients = PersonData::getAll();
$citys = CityData::getAll();

?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Contacto</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatecontac" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Celular*</label>
    <div class="col-md-6">
      <input type="text" name="cellphone" value="<?php echo $user->cellphone;?>" class="form-control" required id="cellphone" placeholder="Celular">
    </div>
  </div>
    
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
    <div class="col-md-6">
    <select name="client_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($clients as $client):?>
      <option value="<?php echo $client->id;?>"><?php echo $client->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ciudad</label>
    <div class="col-md-6">
    <select name="city_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($citys as $city):?>
      <option value="<?php echo $city->id;?>"><?php echo $city->name;?></option>
    <?php endforeach;?>
      </select>    </div>
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