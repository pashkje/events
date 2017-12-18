<?php
namespace backend\controllers;

use yii;
use yii\web\controller;

abstract class AppController extends controller
{
    public function init()
    {
        if (Yii::$app->user->isGuest)
        {
            if (Yii::$app->request->pathInfo != 'login')
            {
                Yii::$app->getResponse()->redirect(Yii::$app->homeUrl.'/login', 301)->send();
                Yii::$app->end();
            }

        }
    }
}