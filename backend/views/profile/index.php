<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$user = Yii::$app->user->identity;
$this->title = 'Редактирования профиля '.$user->username;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'profile']); ?>
        <?= $form->field($model, 'username')->label('Логин'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'phone')->label('Телефон'); ?>
        
        <div class="form-group">
            <p>Группа</p>
            <input class="form-control" disabled="disabled" value="<?=$model->roles;?>">
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
