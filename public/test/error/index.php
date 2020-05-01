<?php

define("DEBUG", 0);

class NotFoundException extends Exception
{
    public function __construct($message = "", $code = 404,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function exceptionHandler($e)
    {
        $this->displayError(
            'Исключение', $e->getMessage(), $e->getFile(), $e->getLine(),
            $e->getCode()
        );
    }

    public function fatalErrorHandler()
    {

        if ($error = error_get_last() and $error['type'] & (E_ERROR | E_PARSE
                | E_COMPILE_ERROR | E_CORE_ERROR)
        ) {
            ob_end_clean();
            $this->displayError(
                $error['type'], $error['message'], $error['file'],
                $error['line']
            );

        } else {
            ob_end_flush();
        }
    }

    public function displayError($errno, $errstr, $errfile, $errline,
        int $rcode = 500
    ) {
        error_log(
            "[" . date('Y-m-d H:i:s')
            . "] Текст ошибки {$errstr} | Файл: {$errfile} | Строка {$errline}\n=========================\n",
            3, __DIR__ . '/errors.log'
        );

        http_response_code($rcode);
        if ($rcode == 404) {
            require WWW . '/erros/404.html';
        } else if (DEBUG) {
            require WWW . '/erros/dev.php';
        } else {
            require WWW . '/erros/prod.php';
        }
        die;
    }
}

new ErrorHandler();

//echo $test;
//test();
//try{
//    if(empty($test)){
//        throw new Exception('Упс');
//    }
//}catch (Exception $e){
//    var_dump($e);
//}
throw new NotFoundException('Страница не найдено1', 404);
//throw new Exception('Упс',404);