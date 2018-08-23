<?php
class EstatusPData {
	public static $tablename = "estatus_prod";



	public function EstatusPData(){
		$this->nameP = "";
		$this->description = "";
	}

	public function add(){
		$sql = "insert into estatus_prod (nameP,description) ";
		$sql .= "value (\"$this->nameP\",\"$this->description\")";
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
		$sql = "update ".self::$tablename." set nameP=\"$this->nameP\", description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new EstatusPData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nameP = $r['nameP'];
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
			$array[$cnt] = new EstatusPData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nameP = $r['nameP'];
			$array[$cnt]->description = $r['description'];
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
			$array[$cnt] = new EstatusPData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nameP = $r['nameP'];
			$array[$cnt]->description = $r['description'];
			$cnt++;
		}
		return $array;
	}


}

?>