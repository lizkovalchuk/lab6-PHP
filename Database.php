<?php
class Database
{
    private static $dsn= 'mysql:host=localhost;dbname=Example_1';
    private static $username ='root';
    private static $password = '';
    private static $db;

    private function __construct()
    {
    }

    public static  function getDb(){
        if(!isset(self::$db)){
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
        return self::$db;
    }

}