<?php
class EstatusRData {
	public static $tablename = "estatus_reg";



	public function EstatusRData(){
		$this->nameE = "";
		$this->description = "";
	}

	public function add(){
		$sql = "insert into estatus_reg (nameE,description) ";
		$sql .= "value (\"$this->nameE\",\"$this->description\")";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nameE=\"$this->nameE\", description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new EstatusRData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nameE = $r['nameE'];
			$data->description = $r['description'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new EstatusRData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nameE = $r['nameE'];
			$array[$cnt]->description = $r['description'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nameE like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new EstatusRData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nameE = $r['nameE'];
			$array[$cnt]->description = $r['description'];
			$cnt++;
		}
		return $array;
	}


}

?>