<?php

class Database {
    private static $db;
    public static function getConnection()
{
    try{
        self::$db=new PDO("mysql:host=localhost;dbname=e-commercepfa","root","");
        self::$db->query("SET NAMES 'utf8'");
        return  self::$db;
    }catch(PDOException $exception){
        die($exception->getMessage());
    }
    //$pdo = new PDO('oci:dbname=127.0.0.1/XE', 'system', 'amal');

}
}