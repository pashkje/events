<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="<?=Yii::$app->homeUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?=Yii::$app->homeUrl;?>/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=Yii::$app->homeUrl;?>/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=Yii::$app->homeUrl;?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body style="background: #fff;">

<?php $this->beginBody() ?>



    <div class="container">
        <?= Alert::widget() ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-top: 0px;">
                        <?= Html::encode($this->title) ?>
                    </h1>
                </div>
            </div>
        <?= $content ?>
    </div>



<?php $this->endBody() ?>
<script src="<?=Yii::$app->homeUrl;?>/js/main.js"></script>
<script src="<?=Yii::$app->homeUrl;?>/js/bootstrap.min.js"></script>
<script src="<?=Yii::$app->homeUrl;?>/js/plugins/morris/raphael.min.js"></script>
<script src="<?=Yii::$app->homeUrl;?>/js/plugins/morris/morris.min.js"></script>
<script src="<?=Yii::$app->homeUrl;?>/js/plugins/morris/morris-data.js"></script>
</body>
</html>
<?php $this->endPage() ?>
