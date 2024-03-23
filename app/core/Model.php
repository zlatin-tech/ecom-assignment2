<?php
namespace app\core;

use PDO;

class Model {
    protected static $_conn = null;

    protected static function getConnection() {
        if (self::$_conn === null) {
            $host = 'localhost';
            $dbname = 'assignment2';
            $user = 'root';
            $pass = '';
            try {
                self::$_conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                self::$_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit;
            }
        }
        return self::$_conn;
    }
}
