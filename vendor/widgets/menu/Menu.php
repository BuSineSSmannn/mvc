<?php


namespace vendor\widgets\menu;
use \R;
use vendor\libs\Cache;

class Menu
{

    protected $data;
    protected $tree;
    protected $menuHTML;
    protected $tpl;
    protected $class = 'menu';
    protected $container = 'ul';
    protected $table = 'categories';
    protected $cache = 3600;
    protected $cacheKey = 'fw_menu';
    protected $setCashe = true;

    public function __construct($options = [])
    {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }
    protected function getOptions($options)
    {
        foreach ($options as $k => $v){
            $this->$k = property_exists($this,$k) ? $v : $this->$k;
        }
    }
    protected function output()
    {
        echo "<{$this->container} class='{$this->class}'>";
            echo $this->menuHTML;
        echo "</{$this->container}>";
    }
    protected function run(){
        $cache = new Cache();
        $this->menuHTML = $cache->get('fw_menu');
        if(!$this->menuHTML){
            $this->data = R::getAssoc("SELECT * FROM ".$this->table);
            $this->tree = $this->getTree();
            $this->menuHTML = $this->getMenuHTML($this->tree);
            if($this->setCashe) $cache->set($this->cacheKey,$this->menuHTML,$this->cache);
        }
        $this->output();
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id=>&$node) {
            if (!$node['parent']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }
    protected function getMenuHTML($tree,$tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab,$id);
        }

        return $str;
    }
    protected function catToTemplate($category,$tab,$id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }


}