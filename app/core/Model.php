<?php
namespace app\core;

use PDO;

class Model{
	protected static $_conn = null;
	public function __construct(){
		$host = 'localhost';
		$dbname = 'assignment2';
		$user = 'root';
		$pass = '';
		try { # MySQL with PDO_MYSQL
			if(self::$_conn == null){
				self::$_conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
				self::$_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}//otherwise the connection exists
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}