<?php
class ContacData {
	public static $tablename = "contac";



	public function ContacData(){
		$this->name = "";
		$this->lastname = "";
		$this->cellphone = "";
		
	}

	public function getClient(){return PersonData:: getById($this->client_id);}
	public function getCity(){return CityData:: getById($this->city_id);}

	public function add(){
		$sql = "insert into contac (name, lastname, cellphone, client_id, city_id) ";
		$sql .= "value (\"$this->name\", \"$this->lastname\", \"$this->cellphone\",$this->client_id, $this->city_id)";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\", lastname=\"$this->lastname\", cellphone=\"$this->cellphone\", client_id=$this->client_id, city_id=$this->city_id where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ContacData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$data->cellphone = $r['cellphone'];
			$data->client_id = $r['client_id'];
			$data->city_id = $r['city_id'];
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
			$array[$cnt] = new ContacData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->cellphone = $r['cellphone'];
			$array[$cnt]->client_id = $r['client_id'];
			$array[$cnt]->city_id = $r['city_id'];
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
			$array[$cnt] = new ContacData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->cellphone = $r['cellphone'];
			$array[$cnt]->client_id = $r['client_id'];
			$array[$cnt]->city_id = $r['city_id'];
			$cnt++;
		}
		return $array;
	}


}

?>