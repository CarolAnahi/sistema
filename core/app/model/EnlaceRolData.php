<?php
class EnlaceRolData {
	public static $tablename = "enlace_function";



	public function EnlaceRolData(){
		$this->rol_id = "";
		$this->enlace_id = "";
		$this->user_id= "";
		$this->fech_reg = "NOW()";
	}
	public function getRol(){ return RolData::getById($this->rol_id);}
	public function getEnlace(){ return EnlaceData::getById($this->enlace_id);}
	
	public function add(){
		$sql = "insert into enlace_function (rol_id, enlace_id, user_id,fech_reg)";
		$sql .= "value ($this->rol_id, $this->enlace_id,$this->user_id\"$this->fech_reg\")";
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

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new EnlaceRolData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->rol_id = $r['rol_id'];
			$data->enlace_id = $r['enlace_id'];
			$data->user_id = $r['user_id'];
			$data->fech_reg = $r['fech_reg'];
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
			$array[$cnt] = new EnlaceRolData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->rol_id = $r['rol_id'];
			$array[$cnt]->enlace_id = $r['enlace_id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->fech_reg = $r['fech_reg'];
			$cnt++;
		}
		return $array;
	}


}

?>