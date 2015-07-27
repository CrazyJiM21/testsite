<?php

class NewsController
{

    public function actionAll()
    {
        $db = new DB();
        $res = $db->query('SELECT * FROM news WHERE id=:id', [':id' => 1]);
        var_dump($res);
        die;
        /*
        $items = News::getAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
        */
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->render('news/one.php');
    }

} 