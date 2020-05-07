<?php

namespace app\controllers;

use app\models\Main;
use R;
use vendor\core\App;
use vendor\core\base\View;

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

        View::setMeta(
            'Главная страница', 'Описание страницы', 'Ключливые слова'
        );
        $this->set(compact('title', 'menu', 'posts'));
    }

    public function testAction()
    {
        if ($this->isAjax()) {
            $model = new Main();
//            $data = ['answer' => 'Ответ с сервера','code'=>200];
//            echo json_encode($data);
            $post = R::findOne('posts', "id = ?", [$_POST['id']]);
            $this->loadView('_test', compact('post'));
            die;
        }
        echo 222;
//        $this->layout = false;
    }
}