<?php
class CityData {
	public static $tablename = "city";



	public function CityData(){
		$this->id = "";
		$this->abb = "";
		$this->name = "";
		}

	public function add(){
		$sql = "insert into city (abb, name) ";
		$sql .= "value (\"$this->abb\", \"$this->name\")";
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
		$sql = "update ".self::$tablename." set abb=\"$this->abb\", name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new CityData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->abb = $r['abb'];
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
			$array[$cnt] = new CityData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->abb = $r['abb'];
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
			$array[$cnt] = new CityData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->abb = $r['abb'];
			$array[$cnt]->name = $r['name'];
			$cnt++;
		}
		return $array;
	}


}

?>