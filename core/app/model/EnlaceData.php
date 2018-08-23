<?php
class EnlaceData {
	public static $tablename = "enlace";



	public function EnlaceData(){
		$this->enlace_name = "";
		$this->enlace = "";
		$this->description = "";
	}

	public function add(){
		$sql = "insert into enlace (enlace_name,enlace, description) ";
		$sql .= "value (\"$this->enlace_name\",\"$this->enlace\",\"$this->description\")";
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
		$sql = "update ".self::$tablename." set enlace_name=\"$this->enlace_name\", enlace=\"$this->enlace\",description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new EnlaceData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->enlace_name = $r['enlace_name'];
			$data->enlace = $r['enlace'];
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
			$array[$cnt] = new EnlaceData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->enlace_name = $r['enlace_name'];
			$array[$cnt]->enlace = $r['enlace'];
			$array[$cnt]->description = $r['description'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where enlace_name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new EnlaceData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->enlace_name = $r['enlace_name'];
			$array[$cnt]->enlace = $r['enlace'];
			$array[$cnt]->description = $r['description'];
			$cnt++;
		}
		return $array;
	}


}

?>