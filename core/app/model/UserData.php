<?php
class UserData {
	public static $tablename = "user";



	public function Userdata(){
		$this->name = "";
		$this->lastname = "";
		$this->ci = "";
		$this->username = "";
		$this->password = "";
		$this->fech_alta = "";
		$this->fech_baja = "";
		$this->created_at = "NOW()";
	}

	public function getCity(){return CityData::getById($this->ciudad_id);}
	
	
	public function add(){
		$sql = "insert into user (name,lastname,ci,username,password,fech_alta, fech_baja, created_at, city_id, rol_id) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->ci\", \"$this->username\",\"$this->password\",$this->fech_alta,$this->fech_baja,$this->created_at, $this->city_id)";
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

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",ci=\"$this->ci\",username=\"$this->username\",city_id=$this->city_id where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}


}

?>