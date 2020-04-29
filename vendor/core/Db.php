<?php


namespace vendor\core;

use R;

class Db
{
    use TSingleton;
    public static $countSql = 0;
    public static $queries = [];
    protected $pdo;

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        require_once LIBS . '/rb.php';
//        var_dump(R::testConnection());
        R::setup($db['dsn'], $db['user'], $db['pass']);
        R::freeze(false);
//        R::fancyDebug(true);


    }


}