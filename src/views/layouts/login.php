<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use common\widgets\LoginNavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\BootstrapAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head();
	
	$this->registerCssFile(Yii::$app->homeUrl.'global/plugins/select2/css/select2.min.css', [
		'depends' => [BootstrapAsset::className()],
	]);
	$this->registerCssFile(Yii::$app->homeUrl.'global/plugins/select2/css/select2-bootstrap.min.css', [
		'depends' => [BootstrapAsset::className()],
	]);
	$this->registerCssFile(Yii::$app->homeUrl.'css/login.css');
	$this->registerJsFile(Yii::$app->homeUrl.'global/plugins/select2/js/select2.full.min.js', ['depends' => [BootstrapAsset::className()]]);
	?>
</head>
<body class="login">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
	LoginNavBar::begin([
				'brandLabel' => Html::img('@web/images/logo-aaoa.png', ['alt'=>Yii::$app->name, 'class'=>'logo-default']),
				'brandUrl' => Yii::$app->homeUrl,
				'brandOptions' => [
					'class' => 'hello',
				],
				'containerOptions' => [
					'tag' => 'div',
				],
				'options' => [
					'class' => 'page-header-inner',
					'tag' => 'div',
				],
				'renderInnerContainer' => false,
			]);
	$menuItems=array();
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    LoginNavBar::end();
    ?>
    <div class="content">        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	<div class="copyright">
		Copyright &copy; 2004 - <?= date('Y') ?> AAOA.com. All Rights Reserved.
	</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
