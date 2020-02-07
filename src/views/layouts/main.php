<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white <?=  	Yii::$app->controller->action->id;?>">
<?php $this->beginBody() ?>

<div class="page-wrapper">
	<?php echo $this->render('header.php'); ?>
	<div class="clearfix"></div>
	<div class="page-container">
		<?php echo $this->render('sidebar.php'); ?>
		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					'itemTemplate'=>'<li>{link} <i class="fa fa-circle"></i> </li> ',
					'activeItemTemplate'=>'<li><span>{link}</span></li> ',
					'options' =>[
						'class'=>'page-breadcrumb',
					],
				]) ?>
				</div>
				<?= Alert::widget() ?>
				<?= $content ?>
			</div>
		</div>
	</div>
	<?php echo $this->render('footer.php'); ?>
</div><!--page-wrapper-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
