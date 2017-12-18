<?php
/**
 * Created by PhpStorm.
 * User: bitrix
 * Date: 06.09.2017
 * Time: 12:02
 * Это базовый контроллер во фронте
 * От наследуются все остальные контроллеры
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;
use common\models\City;

class BaseController extends Controller
{
    //По умолчанию город москва
    private static $city_id = 1;

    public function beforeAction($action)
    {

        $cookies = Yii::$app->request->cookies;
        $city = $cookies->getValue('city_picked');

        if (!empty($city)) {
            self::setCity($city);
        }

        Yii::$app->view->params['city_picked'] = $this->getCity();
        Yii::$app->view->params['city_list'] = City::find()->where(['country_id' => 1])->all();
        //Yii::$app->response->format = Response::FORMAT_HTML;
        return parent::beforeAction($action);
    }

    protected static function setCity($city = 1)
    {
        self::$city_id = $city;
    }

    protected static function getCity()
    {
        return self::$city_id;
    }

    public function actionCity($id)
    {
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new Cookie([
            'name' => 'city_picked',
            'value' => $id,
            'expire' => time() + 3600,
        ]));
        self::setCity($id);
        return;
    }
}