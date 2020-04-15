<?php


namespace vendor\core;

use R;

class Db
{
    public static $countSql = 0;
    public static $queries = [];
    protected static $instance;
    protected $pdo;

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        require_once LIBS . '/rb.php';
//        var_dump(R::testConnection());
        R::setup($db['dsn'], $db['user'], $db['pass']);
        R::freeze(false);
//        R::fancyDebug(true);

//        $options = [
//            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
//        ];
//        $this->pdo = new \PDO($db['dsn'],$db['user'],$db['pass'],$options);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
//    public function execute($sql,$params = []){
//        self::$countSql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql);
//        return $stmt->execute($params);
//    }
//    public function query($sql,$params = []){
//        self::$countSql++;
//        self::$queries[] = $sql;
//        $stmt = $this->pdo->prepare($sql);
//        $res = $stmt->execute($params);
//        if($res !== false){
//            return $stmt->fetchAll();
//        }
//        return [];
//    }
}