<?php
namespace app\controllers\admin;

use fw\core\base\View;

class UserController extends AppController
{
    public function indexAction()
    {
        View::setMeta('Админка :: Главная страница','Описание админки','key');
        $test = 'test';
        $data = [1,2];
        $this->set(compact('test','data'));
    }
    public function testAction()
    {

    }
}