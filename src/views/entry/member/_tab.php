<?php
use yii\helpers\Url;
?>
<div align="center" id="tabs">
	<a href="<?php echo Url::to(['/member/profile?id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='profile')?'active':''?>"> Profile </a> 
	<a href="<?php echo Url::to(['/credit-reports/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='reports')?'active':''?>"> Reports</a>
	<a href="<?php echo Url::to(['/landlordform-user/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='forms')?'active':''?>"> Forms Ordered </a> 
	<?php //if($inventory){ ?>
	<!--<a href="<?php echo Url::to(['/inventory/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='inventory')?'active':''?>"> Inventory </a> -->
	<?php //} ?>
	<a href="<?php echo Url::to(['/transactions/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='transactions')?'active':''?>"> Orders </a> 
	<a href="<?php echo Url::to(['/member-properties/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='properties')?'active':''?>"> Properties </a>
	<a href="<?php echo Url::to(['/tenant-screen-requirment/update?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='screening')?'active':''?>"> Screening </a> 
	<a href="<?php echo Url::to(['/audit/entry/member?user_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='activitylog')?'active':''?>"> Activity Log </a> 
	<a href="<?php echo Url::to(['/temp-tenant-details/index?member_id='.$member_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='temptenant')?'active':''?>"> Incomplete Order </a>
</div>
<div class="push"></div>