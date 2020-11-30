<?php
// class DB{
// 	private static $_instance;
// 	private $_db;

// 	private function __construct(){
// 		try{
// 			$this->_db = new PDO("mysql:host=localhost;dbname=chatappPhp","root","");
// 		}catch(PDOException $e){
// 			die($e->getMessage());
// 		}
// 	}

// 	public static function getInstance(){
// 		if (!isset(self::$_instance)) {
// 			self::$_instance = new DB();
// 		}
// 		return self::$_instance;
// 	}

// 	public function insert($table,$keyValue){
// 		$keyString = "";
// 		$fieldString = "";
// 		$values = [];
// 		$x = 1;

// 		if (array_key_exists('password', $keyValue)) {
// 			$newPassword = md5($keyValue['password']);
// 			$keyValue['password'] = $newPassword;
// 		}

// 		//print_r($keyValue);die();
// 		foreach ($keyValue as $key => $value) {
// 			$keyString .= '`'.$key.'`,';
// 			$fieldString .= '?,';
// 			$values[] = $value;
// 		}

// 		$keyString = rtrim($keyString,',');
// 		$fieldString = rtrim($fieldString, ',');

// 		$sql = "INSERT INTO `$table` ($keyString) values ($fieldString)";
// 		$query = $this->_db->prepare($sql);

// 		foreach ($values as $val) {
// 			$query->bindValue($x,$val);
// 			$x++;
// 		}

// 		if ($query->execute()) {
// 			return true;
// 		} else{
// 			return false;
// 		}
// 	}

// 	public function login($userInfo){
// 		$username = $userInfo['name'];
// 		$password = $userInfo['password'];

// 		$hasPassword = md5($password);
// 		$sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$hasPassword'";
// 		//die($sql);
// 		$query = $this->_db->prepare($sql);
// 		$feed = $query->execute();
// 		//print_r($query->fetch());die();
// 		if ($query->fetchColumn()) {
// 			return true;
// 		}else{
// 			return "Your username or password is incorret";
// 		}
// 	}


// }


class DB{
	private static $_instance;
	private $_db, $_query, $_result;
	private function __construct(){
		try{
			$this->_db = new PDO("mysql:host=localhost;dbname=chatappPhp","root","");
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	private function _insert($sql,$vals){
		$this->_query = $this->_db->prepare($sql);
		$count = 1;
		foreach ($vals as $key) {
			$this->_query->bindValue($count,$key);
			$count++;
		}
		$this->_query->execute();	
	}

	public function msgInsert($bundal){
		$sql = "INSERT INTO msg (`senderName`,`receiverName`,`msgContent`,`status`) VALUES ($bundal[1],$bundal[2],'$bundal[0]','unread')";
		$this->_query = $this->_db->prepare($sql);
		$this->_query->execute();
	}

	public function makeQuery($table,$value){
		if ($value['password']) {
			$value['password'] = md5($value['password']);
		}

		if (isset($value['logName'])) {
			$sql = "SELECT * FROM `$table` WHERE username = '".$value['logName']."' and password = '".$value['password']."'";
			$this->_query = $this->_db->prepare($sql);
			$this->_query->execute();
			$result = $this->_query->fetchColumn();
			if ($result>1) {
				return $result;
			}else{
				return false;
			}
		} else{

			$keys = "";
			$keyVal = "";
			$vals = [];

			foreach ($value as $key => $val) {
				$keys .= '`'.$key.'`,';
				$keyVal .= '?,';
				$vals[] = $val;
			}

			$keys = rtrim($keys,',');
			$keyVal = rtrim($keyVal,',');

			$sql = "INSERT INTO `$table` ({$keys}) VALUES ({$keyVal})";
			if($this->_insert($sql,$vals)){
				if ($table=='user') {
					header('Location:home.php');
				}
			}else{
				return "There is somethink wrong";
			}
		}
	}

	public function runQuery($table,$parameter){
		if ($parameter == null) {
			$sql = "SELECT * FROM $table";
			$this->_query = $this->_db->prepare($sql);
			if ($this->_query->execute()) {
				$this->_result = $this->_query->fetchAll();
				return $this;
			}else{
				return "There is no table of your query";
			}
		}
	}

	public function result(){
		return $this->_result;
	}
}
?>