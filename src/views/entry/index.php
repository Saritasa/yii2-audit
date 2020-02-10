<?php

use saritasa\yii2\audit\Audit;
use yii\helpers\Html;
use yii\grid\GridView;

use saritasa\yii2\audit\models\AuditEntrySearch;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('audit', 'Activity Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('audit', 'Audit'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row audit-entry-index">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>
						<span class="caption-subject bold "> <?= Html::encode($this->title) ?> </span>
					</div>
				</div>
		<div class="portlet-body">
			<?php
				if($user_id != 0 && $type == 'vendor'){
					echo $this->render('vendor/_tab',[
						'active' => 'activitylog',
						'vendor_id' => $user_id,
					]);

				}elseif($user_id != 0 && $type == "member"){
					echo $this->render('member/_tab',[
						'active' => 'activitylog',
						'member_id' => $user_id,
					]);
				} ?>
			<div id="sample_1_2_wrapper" class="dataTables_wrapper">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
			['contentOptions' => ['class' => 'action'], 'class' => 'yii\grid\ActionColumn', 'header' => 'Action',
			 'buttons' => [
				'view' => function ($url, $model) {
						//return '';
						return Html::a(
							'<button type="button" class="btn purple"><i class="fa fa-eye"></i></button>',
							['view','id'=>$model->id],
							[
								'title' => 'View',
								'data-pjax' => '0',
								//'class' => 'btn btn-sm btn-outline green',
							]
						);
					},
				'update' => function($url){ return '';},
				'delete' => function($url){ return '';},
				]
			],
            'id',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('audit', 'User'),
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    return Audit::getInstance()->getUserIdentifier($data->user_id);
                },
                'format' => 'raw',
            ],
            [
                'filter' => AuditEntrySearch::methodFilter(),
                'attribute' => 'request_method',
            ],
            [
                'filter' => [1 => \Yii::t('audit', 'Yes'), 0 => \Yii::t('audit', 'No')],
                'attribute' => 'ajax',
                'value' => function($data) {
                    return $data->ajax ? Yii::t('audit', 'Yes') : Yii::t('audit', 'No');
                },
            ],
			'ip',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'route',
                'filter' => AuditEntrySearch::routeFilter(),
                'format' => 'html',
                'value' => function ($data) {
                    return HTML::tag('span', '', [
                        'title' => \yii\helpers\Url::to([$data->route]),
                        'class' => 'glyphicon glyphicon-link'
                    ]) . ' ' . $data->route;
                },
            ],
            [
                'attribute' => 'duration',
                'format' => 'decimal',
                'contentOptions' => ['class' => 'text-right', 'width' => '100px'],
            ],
            [
                'attribute' => 'memory_max',
                'format' => 'shortsize',
                'contentOptions' => ['class' => 'text-right', 'width' => '100px'],
            ],
            [
                'attribute' => 'trails',
                'value' => function ($data) {
                    return $data->trails ? count($data->trails) : '';
                },
                'contentOptions' => ['class' => 'text-right'],
            ],
            [
                'attribute' => 'mails',
                'value' => function ($data) {
                    return $data->mails ? count($data->mails) : '';
                },
                'contentOptions' => ['class' => 'text-right'],
            ],
            [
                'attribute' => 'javascripts',
                'value' => function ($data) {
                    return $data->javascripts ? count($data->javascripts) : '';
                },
                'contentOptions' => ['class' => 'text-right'],
            ],
            [
                'attribute' => 'errors',
                'value' => function ($data) {
                    return $data->linkedErrors ? count($data->linkedErrors) : '';
                },
                'contentOptions' => ['class' => 'text-right'],
            ],
            [
                'attribute' => 'created',
				'value' => function($data){
						return date('m-d-Y h:i',strtotime($data->created));
					},
                'options' => ['width' => '150px'],
            ],
        ],'tableOptions' => ['class' => 'table table-striped table-bordered table-advance table-hover'],
		'layout' => '<div class="table-responsive">
                                                    {items}
                                                </div>
						<div class="row">
							<div class="col-md-5 col-sm-5">{summary}</div>
							<div class="col-md-7 col-sm-7">
								<div id="sample_1_2_paginate" class="dataTables_paginate paging_bootstrap_full_number">
								{pager}
								</div>
							</div>
						</div>',
    ]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
