<?php
class ProductData {
	public static $tablename = "product";

	public function ProductData(){
		$this->name = "";
		$this->price_in = "";
		$this->price_out = "";
		$this->brand = "";
		$this->user_id = "";
		$this->presentation = "0";
		$this->created_at = "NOW()";
		$this->model = "";
		$this->serial="";
		$this->tipe_prod="";
		
	}

	public function getCategory(){ return CategoryData::getById($this->category_id);}
	public function getEstatusR(){ return EstatusRData::getById($this->estatusR_id);}
	public function getEstatusP(){ return EstatusPData::getById($this->estatusP_id);}
	public function getLocation(){ return LocationData::getById($this->location_id);}
	

	public function add1(){
		$sql = "insert into ".self::$tablename." (part_number,name,description, brand, user_id,category_id, created_at, estatusR_id, estatusP_id, model, tipe_prod, location_id) ";
		$sql .= "value (\"$this->part_number\",\"$this->name\",\"$this->description\",\"$this->brand\",$this->user_id,$this->category_id, NOW(), $this->estatusR_id,$this->estatusP_id,\"$this->model\", \"$this->tipe_prod\", $this->location_id)";
		return Executor::doit($sql);
	}

		public function add2(){
		$sql = "insert into ".self::$tablename." (name,description, brand,user_id, category_id, created_at, estatusR_id, estatusP_id, model, serial, tipe_prod, location_id) ";
		$sql .= "value (\"$this->name\",\"$this->description\",\"$this->brand\",$this->user_id,$this->category_id, NOW(),$this->estatusR_id,$this->estatusP_id,\"$this->model\", \"$this->serial\", \"$this->tipe_prod\", $this->location_id)";
		return Executor::doit($sql);
	}

	public function add_with_image1(){
		$sql = "insert into ".self::$tablename." (image, part_number, name, brand, description, user_id, category_id, created_at, estatusR_id, estatusP_id, model, serial, tipe_prod, location_id) ";
		$sql .= "value (\"$this->image\",\"$this->part_number\",\"$this->name\",\"$this->brand\",\"$this->description\",$this->user_id ,$this->category_id, NOW(),$this->estatusR_id, $this->estatusP_id, \"$this->model\", \"$this->serial\", \"$this->tipe_prod\", $this->location_id)";
		return Executor::doit($sql);
	}

	public function add_with_image2(){
		$sql = "insert into ".self::$tablename." (image, name, brand, description, user_id, category_id, created_at, estatusR_id, estatusP_id, model, serial, tipe_prod, location_id) ";
		$sql .= "value (\"$this->image\",\"$this->name\",\"$this->brand\",\"$this->description\",$this->user_id,$this->category_id, NOW(), $this->estatusR_id, $this->estatusP_id, \"$this->model\", \"$this->serial\", \"$this->tipe_prod\", $this->location_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function updateI(){
		$sql = "update ".self::$tablename." set part_number=\"$this->part_number\",name=\"$this->name\", description=\"$this->description\", brand=\"$this->brand\",category_id=$this->category_id,estatusR_id=$this->estatusR_id, estatusP_id=$this->estatusP_id, is_active=\"$this->is_active\", model=\"$this->model\", tipe_prod=\"$this->tipe_prod\", location_id=$this->location_id where id=$this->id";
		Executor::doit($sql);
	}


	public function updateE(){
		$sql = "update ".self::$tablename." set name=\"$this->name\", description=\"$this->description\", brand=\"$this->brand\",category_id=$this->category_id,estatusR_id=$this->estatusR_id, estatusP_id=$this->estatusP_id, is_active=\"$this->is_active\", model=\"$this->model\", serial=\"$this->serial\", tipe_prod=\"$this->tipe_prod\", location_id=$this->location_id where id=$this->id";
		Executor::doit($sql);
	}

	public function del_category(){
		$sql = "update ".self::$tablename." set category_id=NULL where id=$this->id";
		Executor::doit($sql);
	}


	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getTipe(){
		$sql = "select DISTINCT tipe_prod from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where part_number like '%$p%' or name like '%$p%' or id like '%$p%' or tipe_prod like '%$p%' or estatusR_id in (select id from estatus_reg where nameE like '%$p%') or estatusP_id in (select id from estatus_prod where nameP like '%$p%') or location_id in (select id from technical_location where name like '%$p%') ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where category_id=$category_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


}

?>