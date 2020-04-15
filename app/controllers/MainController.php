<?php

namespace app\controllers;

use app\models\Main;
use R;

class MainController extends AppController
{
    public $layout = 'default';

    public function indexAction()
    {
        new Main();
        $posts = R::findAll('posts');
        $menu = $this->menu;
        $title = 'PAGE TITLE';
        $this->setMeta('Главная страница', 'Описание страницы', 'Ключливые слова');
        $meta = $this->meta;
        $this->set(compact('title', 'menu', 'posts', 'meta'));
    }

    public function testAction()
    {
        $this->layout = 'test';
    }
}