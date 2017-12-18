<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавить работника';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">    
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'staff']); ?>

                <?= $form->field($model, 'username')->textInput()->label('Логин') ?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'phone')->label('Телефон') ?>
                
                <?= $form->field($model, 'roles')->dropDownList(['admin' => 'admin', 'moderator' => 'moderator']) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить на галеру', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
