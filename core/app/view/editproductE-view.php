<?php
$product = ProductData::getById($_GET["id"]);
$categories = CategoryData::getAll();
$statusR = EstatusRData::getAll();
$statusP = EstatusPData::getAll();
$locations = LocationData::getAll();

if($product!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $product->name ?> <small>Editar Producto Equipo</small></h1>
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	 <br>
<td><div class="row">
    <div class="col-md-3">
      <a class="btn btn-sm btn-default" href="<?php echo "index.php?view=products"?>">Volver <i class="glyphicon glyphicon-chevron-left"></i></a>
      </div>
      </div>
    </td>
  <br>

		<form class="form-horizontal" method="post" id="addproductE" enctype="multipart/form-data" action="index.php?view=updateproductE" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Imagen*</label>
    <div class="col-md-8">
      <input type="file" name="image" id="name" placeholder="">
<?php if($product->image!=""):?>
  <br>
        <img src="storage/products/<?php echo $product->image;?>" class="img-responsive">

<?php endif;?>
    </div>
  </div>
 
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre*</label>
    <div class="col-md-8">
      <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Marca*</label>
    <div class="col-md-8">
      <input type="text" name="brand" class="form-control" id="brand" value="<?php echo $product->brand; ?>" placeholder="Marca del Producto">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Modelo*</label>
    <div class="col-md-8">
      <input type="text" name="model" class="form-control" id="model" value="<?php echo $product->model; ?>" placeholder="Modelo del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Numero de Serie*</label>
    <div class="col-md-8">
      <input type="text" name="serial" class="form-control" id="serial" value="<?php echo $product->serial; ?>" placeholder="Numero de Serie">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Linea de Negocio</label>
    <div class="col-md-8">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>" <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Linea de Negocio</label>
    <div class="col-md-8">
    <select name="category_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($categories as $category):?>
      <option value="<?php echo $category->id;?>" <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>><?php echo $category->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Estado del Registro</label>
    <div class="col-md-8">
    <select name="estatusR_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($statusR as $stateR):?>
      <option value="<?php echo $stateR->id;?>" <?php if($product->estatusR_id!=null&& $product->estatusR_id==$stateR->id){ echo "selected";}?>><?php echo $stateR->nameE;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Tipo de Producto*</label>
    <div class="col-md-8">
      <input type="text" name="tipe_prod" class="form-control" id="tipe_prod" value="<?php echo $product->tipe_prod; ?>" readonly="readonly">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Ubicacion Técnica</label>
    <div class="col-md-8">
    <select name="location_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($locations as $location):?>
      <option value="<?php echo $location->id;?>" <?php if($product->location_id!=null&& $product->location_id==$location->id){ echo "selected";}?>><?php echo $location->name;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Descripcion</label>
    <div class="col-md-8">
      <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"><?php echo $product->description;?></textarea>
    </div>
  </div>
    

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Producto</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>