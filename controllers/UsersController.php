<?php

class UsersController {

    public function actionAll()
    {
        $items = Users::getAll();
        include __DIR__ . '/../views/users/all.php';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = Users::getOne($id);
        include __DIR__ . '/../views/users/one.php';
    }

} 