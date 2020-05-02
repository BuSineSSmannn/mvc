<?php


namespace vendor\core;


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
        $this->logErrors($errstr, $errfile, $errline);
        if(DEBUG){
            $this->displayError($errno, $errstr, $errfile, $errline);
        }
        return true;
    }

    public function exceptionHandler($e)
    {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
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
            $this->logErrors($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError(
                $error['type'], $error['message'], $error['file'],
                $error['line']
            );

        } else {
            ob_end_flush();
        }
    }

    protected function logErrors($message = '', $file = '', $line = '')
    {

        error_log(
            "[" . date('Y-m-d H:i:s')
            . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=========================\n",
            3, ROOT . '/tmp/errors.log'
        );

    }

    public function displayError($errno, $errstr, $errfile, $errline, $rcode = 500  ) {

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