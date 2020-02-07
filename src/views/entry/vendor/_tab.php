<?php
use yii\helpers\Url;
?>
<div align="center" id="tabs">
	<a href="<?php echo Url::to(['/vendor/profile?id='.$vendor_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='profile')?'active':''?>"> Profile </a> 
	<a href="<?php echo Url::to(['/vendor/areas?id='.$vendor_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='areas')?'active':''?>"> Areas</a>
	<a href="<?php echo Url::to(['/vendor/listing/?id='.$vendor_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='listing')?'active':''?>"> Listing </a>	
	<a href="<?php echo Url::to(['/vendor/vendor-transaction/?vendor_id='.$vendor_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='transactions')?'active':''?>"> Transactions</a>
	<a href="<?php echo Url::to(['/audit/entry/vendor?user_id='.$vendor_id], true) ?>" class="btn btn-outline sbold blue-madison <?php echo ($active=='activitylog')?'active':''?>"> Activity Log</a>
	
</div>
<div class="push"></div>