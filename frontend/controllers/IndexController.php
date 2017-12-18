<?php
/**
 * Created by PhpStorm.
 * User: bitrix
 * Date: 06.09.2017
 * Time: 12:14
 */

namespace frontend\controllers;
use Yii;
use \common\models\Event;
use frontend\controllers\BaseController;

class IndexController extends BaseController
{
    public function actionIndex(){
        $items = Event::find()
            ->where(['city_id' => self::getCity()])
            ->andWhere(['<', 'start_date', 'CURRENT_TIMESTAMP'])
            ->offset(0)
            ->limit(25)
            ->orderBy('start_date ASC')
            ->all();
        return $this->render('index', ['items' => $items]);

    }
}