<?php 
$categories = CategoryData::getAll();
$statusR = EstatusRData::getAll();
$statusP = EstatusPData::getAll();
$locations = LocationData::getAll();
$tipeop='Equipo';
    ?>
<div class="row">
  <div class="col-md-12">
  <h1>Nuevo Equipo</h1>
  <br>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?view=addproductE" role="form">

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="image" id="image" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
      <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre del Producto">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Marca*</label>
      <div class="col-md-6">
      <input type="text" name="brand" required class="form-control" id="brand" placeholder="Marca del Producto">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Modelo</label>
      <div class="col-md-6">
      <input type="text" name="model" class="form-control" id="model" placeholder="Modelo del Producto">
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Numero de Serie</label>
      <div class="col-md-6">
      <input type="text" name="serial" class="form-control" id="serial" placeholder="Numero de Serie del Producto">
      </div>
   </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Linea de Negocio</label>
    <div class="col-md-6">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
<!-- -->
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado del Registro</label>
    <div class="col-md-6">
    <select name="estatusR_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($statusR as $stateR):?>
      <option value="<?php echo $stateR->id;?>"><?php echo $stateR->nameE;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado del Producto</label>
    <div class="col-md-6">
    <select name="estatusP_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($statusP as $stateP):?>
      <option value="<?php echo $stateP->id;?>"><?php echo $stateP->nameP;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
<!---->
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Producto </label>
      <div class="col-md-6">
      <input type="text" name="tipe_prod" required class="form-control" value="<?php echo $tipeop;?>" readonly="readonly">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
      <div class="col-md-6">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea>
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ubicacion Técnica</label>
    <div class="col-md-6">
    <select name="location_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($locations as $location):?>
      <option value="<?php echo $location->id;?>"><?php echo $location->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </div>
  </div>
</form>

  </div>
</div>

<script>
  $(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});

</script>