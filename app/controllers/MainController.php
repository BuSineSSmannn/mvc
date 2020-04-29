<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;

class MainController extends AppController
{
    public $layout = 'default';

    public function indexAction()
    {
        $model = new Main();
//        R::fancyDebug(true);

        $posts = APP::$app->cache->get('posts');
        if (!$posts) {
            $posts = R::findAll('posts');
            APP::$app->cache->set('posts', $posts, 3600);
        }
        $menu = $this->menu;
        $title = 'PAGE TITLE';
        $this->setMeta(
            'Главная страница', 'Описание страницы', 'Ключливые слова'
        );
        $post = R::find('posts', 'id = 1 LIMIT 1');
        $meta = $this->meta;
        $this->set(compact('title', 'menu', 'posts', 'meta'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            echo 111;
            die;
        }
        echo 222;
        $this->layout = 'test';
    }
}