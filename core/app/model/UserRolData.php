<?php
class UserRolData {
	public static $tablename = "user_rol";



	public function UserRolData(){
		$this->user_id = "";
		#$this->rol_id = "";
		$this->fech_alta = "";
		$this->fech_baja = "";
		$this->fech_reg = "NOW()";
		$this->category_id = "";
	}

	public function getRol(){return RolData::getById($this->rol_id);}
	public function getUser(){return UserData::getById($this->user_id);}
	

	public function add(){
		$sql = "insert into user_rol (rol_id, user_id, fech_alta, fech_baja, fech_reg, category_id) ";
		$sql .= "value ($this->rol_id, $this->user_id, $this->fech_alta, $this->fech_baja,\"$this->created_at\", $this->category_id)";
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
		$data = new UserFunctionData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->rol_id = $r['rol_id'];
			$data->user_id= $r['user_id'];
			$data->fech_alta = $r['fech_alta'];
			$data->fech_baja = $r['fech_baja'];
			$data->fech_reg = $r['fech_reg'];
			$data->category_id = $r['category_id'];
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
			$array[$cnt] = new UserRolData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->rol_id = $r['rol_id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->fech_alta = $r['fech_alta'];
			$array[$cnt]->fech_baja = $r['fech_baja'];
			$array[$cnt]->fech_reg = $r['fech_reg'];
			$array[$cnt]->category_id = $r['category_id'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserRolData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->rol_id = $r['rol_id'];
			$array[$cnt]->user_id = $r['user_id'];
			$array[$cnt]->fech_alta = $r['fech_alta'];
			$array[$cnt]->fech_baja = $r['fech_baja'];
			$array[$cnt]->fech_reg = $r['fech_reg'];
			$array[$cnt]->category_id = $r['category_id'];
			$cnt++;
		}
		return $array;
	}


}

?>