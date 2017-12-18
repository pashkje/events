<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Staff;
use common\models\StaffForm;

class StaffController extends AppController
{
    public function actionIndex()
    {
        $staff = Staff::find()->all();

        return $this->render('index', ['staff' => $staff]);
    }
    
    public function actionAdd()
    {
        $model = new StaffForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $this->redirect(Yii::$app->homeUrl.'/staff');
        }
              
        return $this->render('add',[
            'model' => $model,
        ]);
    }
}