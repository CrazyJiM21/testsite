<?php

class UsersController {

    public function actionAll()
    {
        $user = UsersModel::findOneByPK(2);
        $user->nickname = 'Shrek';
        $user->password = 'stonestone';
        $user->about = 'I am the ugliest!';
        //$user->update();

        $users = UsersModel::findAll();
        foreach ($users as $user) {
            echo $user . '<br>';
        }

    }

} 