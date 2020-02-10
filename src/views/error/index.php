<?php

use yii\helpers\Html;
use yii\grid\GridView;

use saritasa\yii2\audit\models\AuditErrorSearch;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('audit', 'Errors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('audit', 'Audit'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row audit-error-index">
	<div class="col-md-12">
		<div class="portlet box blue">
			<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-users"></i>
						<span class="caption-subject bold "> <?= Html::encode($this->title) ?> </span>
					</div>
				</div>
		<div class="portlet-body">
		<div id="sample_1_2_wrapper" class="dataTables_wrapper">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
            [
                'attribute' => 'id',
                'options' => [
                    'width' => '80px',
                ],
            ],
            [
                'attribute' => 'entry_id',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    return $data->entry_id ? Html::a($data->entry_id, ['entry/view', 'id' => $data->entry_id]) : '';
                },
                'format' => 'raw',
            ],
            'message',
            [
                'attribute' => 'code',
                'options' => [
                    'width' => '80px',
                ],
            ],
            [
                'filter' => AuditErrorSearch::fileFilter(),
                'attribute' => 'file',
            ],
            [
                'attribute' => 'line',
                'options' => [
                    'width' => '80px',
                ],
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
