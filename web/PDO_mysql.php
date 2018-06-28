<?php
class PDO_mysql{
    static $db_host = 'db.mis.kuas.edu.tw';
    static $db_name = 's1105137143';
    static $db_user = 's1105137143';
    static $db_password = 'T124363154';
    
    static function getConnection(){
        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$db_host,self::$db_name);
        try{
            $conn = new PDO($dsn,self::$db_user,self::$db_password);
            return $conn;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
?>
