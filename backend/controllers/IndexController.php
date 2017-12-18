<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionError()
    {
        return $this->render('error');
    }

}