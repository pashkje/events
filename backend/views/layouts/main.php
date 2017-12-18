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
<body>

<?php $this->beginBody() ?>



    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=Yii::$app->homeUrl;?>">Супер админка</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=Yii::$app->user->identity->username;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=Yii::$app->homeUrl;?>/profile"><i class="fa fa-fw fa-user"></i> Профиль</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="<?=Yii::$app->homeUrl;?>/logout"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?=Yii::$app->homeUrl;?>"><i class="fa fa-fw fa-home"></i> Главная</a>
                    </li>
                    <li>
                        <a href="<?=Yii::$app->homeUrl;?>/staff"><i class="fa fa-fw fa-user"></i> Персонал</a>
                    </li>                    
                    <li>
                        <a href="<?=Yii::$app->homeUrl;?>/users"><i class="fa fa-fw fa-user"></i> Пользователи</a>
                    </li>                                         
                    <li>
                        <a href="<?=Yii::$app->homeUrl;?>/clients"><i class="fa fa-fw fa-users"></i> Подборщики</a>
                    </li>                                        
                    <li>
                        <a href="<?=Yii::$app->homeUrl;?>/reviews"><i class="fa fa-fw fa-edit"></i> Отзывы</a>
                    </li>                     
                    <li>
                        <a href="<?=Yii::$app->homeUrl;?>/feedback"><i class="fa fa-fw fa-microphone"></i> Обратная связь</a>
                    </li>                   

                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    
    <div id="page-wrapper">
        <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
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
