<div class="page-footer">
	<div class="page-footer-inner">Copyright &copy; 2004 - <?= date('Y') ?> AAOA.com. All Rights Reserved.</div>
	<div class="scroll-to-top" style="display: block;">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<?php
$this->registerJsFile(
	'@web/global/plugins/counterup/jquery.waypoints.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()],'position' => 3]
);
 $this->registerJsFile(
    '@web/global/plugins/counterup/jquery.counterup.min.js',
	['depends' => [\yii\web\JqueryAsset::className()],'position' => 3]
);

 /* For dateRange Picker*/
$this->registerJsFile(
    '@web/global/scripts/dashboard.js',
	//'@web/global/plugins/counterup/jquery.waypoints.min.js',
    ['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);

$this->registerJsFile(
    '@web/global/plugins/morris/morris.min.js',
	['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);
$this->registerJsFile(
    '@web/global/plugins/morris/raphael-min.js',
	['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);

$this->registerJsFile(
    '@web/global/plugins/moment.min.js',
	['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);
$this->registerJsFile(
    '@web/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
	['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);
$this->registerJsFile(
    '@web/global/plugins/jquery-easypiechart/jquery.easypiechart.js',
	['depends' => [\yii\web\JqueryAsset::className()], 'position' => 3]
);