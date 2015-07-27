<?php

class NewsController
{

    public function actionAll()
    {
        $article = NewsModel::findOneByPK(1);
        echo $article;
    }


} 