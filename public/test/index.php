<?php

$config = [
    'components' => [
        'cache' => 'classes\Cache',
        'test'  => 'classes\Test',
    ]
];
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        if (is_file($file)) {
            require_once $file;
        }

    }
);


$app = Registry::instance();
$app->test->go();
$app->test2 = 'classes\Test2';
//$app->getList();
$app->test2->hello();
