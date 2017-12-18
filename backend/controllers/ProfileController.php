<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Staff;
use common\models\LoginForm;

class ProfileController extends AppController
{    
    public function actionIndex()
    {
        $model = Staff::findOne(Yii::$app->user->identity->id);    
        
        if (empty($model)) $this->redirect(Yii::$app->homeUrl);
        
        if ($model->load(\Yii::$app->request->post()) && $model->validate()){

            $model->save();
            $this->redirect(Yii::$app->homeUrl.'/profile');
        }
              
        return $this->render('index',[
            'model' => $model,
        ]);
    }    

}