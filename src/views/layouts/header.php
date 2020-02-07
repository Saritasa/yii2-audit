<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use common\widgets\NavBar;
?>	
	<div class="page-header navbar navbar-fixed-top">
			<?php
			NavBar::begin([
				'brandLabel' => Html::img('@web/images/logo-aaoa.png', ['alt'=>Yii::$app->name, 'class'=>'logo-default']),
				'brandUrl' => Yii::$app->homeUrl,
				'brandOptions' => [
					'class' => ''
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
			
			if (!Yii::$app->user->isGuest) {
				?>
				<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<div class="img-circle user-pic"><?=strtoupper(Yii::$app->user->identity->st_username[0])?></div>
						<span class="username username-hide-on-mobile"><?=Yii::$app->user->identity->st_username?></span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li calss="dropdown dropdown-user">
						<?=
						Html::a('<i class="icon-key"></i> Log Out',
						   ['/site/logout'],
						   ['data-method' => 'post'])
						?>
						</li>
					</ul>
				</div>
				<?php
			}			
			NavBar::end();
			?>
	</div><!-- page-header -->
<script>
var start_date = '';
var end_date = '';
</script>