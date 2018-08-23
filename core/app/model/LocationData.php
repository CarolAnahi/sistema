<?php
class LocationData {
	public static $tablename = "technical_location";



	public function LocationData(){
		$this->name = "";
		}

	public function add(){
		$sql = "insert into technical_location (name) ";
		$sql .= "value (\"$this->name\")";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new LocationData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
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
			$array[$cnt] = new LocationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new LocationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$cnt++;
		}
		return $array;
	}


}

?>