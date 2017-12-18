<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
var GLOBAL_BASE_URL = '<?=Yii::$app->request->BaseUrl;?>';
<?php $this->beginBody() ?>

<div class="wrap">
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <select class="form-control" id="city_list">
                    <?php foreach ($this->params['city_list'] as $city): ?>
                        <option <?php if ($city->vk_id == $this->params['city_picked']): ?>selected<?php endif; ?>
                                value="<?= $city->vk_id; ?>"><?= $city->title; ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

        </div>
    </nav>

    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<?php $this->registerJsFile(Yii::$app->request->BaseUrl.'/assets/js/common.js');?>

</body>
</html>
<?php $this->endPage() ?>
