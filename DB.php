<?php
class DB{
	private static $_instance;
	private $_db;

	private function __construct(){
		try{
			$this->_db = new PDO("mysql:host=localhost;dbname=chatappPhp","root","");
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if (!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function insert($table,$keyValue){
		$keyString = "";
		$fieldString = "";
		$values = [];
		$x = 1;
		foreach ($keyValue as $key => $value) {
			$keyString .= '`'.$key.'`,';
			$fieldString .= '?,';
			$values[] = $value;
		}

		$keyString = rtrim($keyString,',');
		$fieldString = rtrim($fieldString, ',');

		$sql = "INSERT INTO `$table` ($keyString) values ($fieldString)";
		$query = $this->_db->prepare($sql);

		foreach ($values as $val) {
			$query->bindValue($x,$val);
			$x++;
		}

		if ($query->execute()) {
			return true;
		} else{
			return false;
		}
	}


}
?>