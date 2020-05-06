<?php
use yii\widgets\Menu;
use yii\helpers\Url;
?>
<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<?php 
			$state =   Yii::$app->getRequest()->getQueryParam('state');
		    $controller = Yii::$app->controller->id;
			$action  = Yii::$app->controller->action->id;
			if($action == 1)
				$action = Yii::$app->controller->action->actionMethod;
			$AdminManagement = [];
		
			if(Yii::$app->user->identity->en_role == 'SuperAdmin'){
				$AdminManagement =  [
				'label' => 'Admin Management', 
				'url' => Url::to(['/admin'], true),
				'options' => ["class"=>($controller == "admin" && $action != "dashboard" && $action != "numeric-data" && $action != "by-days" && $action != "by-months" && $action != "by-years") ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-user"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				];
				
			}
		?>
		<?php 
		
		 //echo  Menu::widget(['items' => [['label' => 'Home', 'url' => ['site/index']],['label' => 'About', 'url' => ['site/index']], ],  'activeCssClass'=>'active', ]);
		
		?>
		<?php echo Menu::widget([
			'options' => ['class' => 'page-sidebar-menu  page-header-fixed page-sidebar-menu-light', 'data-auto-scroll' => "true", 'data-keep-expanded'=>"false", "data-slide-speed"=>"200", "style"=>"padding-top: 20px"],
			'items' => [
				[
					'label' => 'Dashboard', 
					'url' => Url::to(['/admin/dashboard'], true),
					'options' => ["class"=>(($controller == "admin" && $action == "dashboard" )) ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-home"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				],
				[
					'label' => 'Days-Months-Years report', 
					'url' => Url::to(['admin/numeric-data'], true),
					'options' => ["class"=>($controller == "admin"  && $action == "numeric-data") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-table"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				],
			/*	[
				'label' => 'View Numeric Data', 
				'url' => Url::to(['/admin/admin/numeric-data'], true),
				'options' => ["class"=>($controller == "admin" && ($action == "numeric-data" || $action == "by-days" || $action == "by-months" || $action == "by-years")) ? ' nav-item open':'nav-item'], 
				'activeCssClass' => 'open',
				'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-table"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'By-Day', 'url' => Url::to(['/admin/by-days'], true), "options"=> ["class"=> ($action == "by-days") ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'By-Month', 'url' => Url::to(['/admin/by-months'], true), "options"=> ["class"=> $action == "by-months" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'By-Year', 'url' => Url::to(['/admin/by-years'], true), "options"=> ["class"=> $action == "by-years" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				],
				[
					'label' => 'Users', 
					'url' => 'user',
					'options' => ["class"=>"nav-item"], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-users"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				],*/
				[
					'label' => 'Welcome Pack', 
					'url' => Url::to(['/welcome-pack/index'], true),
					'options' => ["class"=>($controller == "welcome-pack") ? ' nav-item open':'nav-item'], 
					'activeCssClass' => 'open',
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-diamond"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Welcome Pack', 'url' => Url::to(['/welcome-pack/index'], true), "options"=> ["class"=> $action == "actionIndex" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Renewal Welcome Pack', 'url' => Url::to(['/welcome-pack/renewwp'], true), "options"=> ["class"=> $action == "actionRenewwp" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Pack', 'url' =>Url::to(['/welcome-pack/vendorwp'], true), "options"=> ["class"=> $action == "actionVendorwp" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Renewal Pack', 'url' => Url::to(['/welcome-pack/vendorrenewalwp'], true), "options"=> ["class"=> $action == "actionVendorrenewalwp" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				],
				[
					'label' => 'Member Search', 
					'url' => Url::to(['member/state'],true),
					'options' => ['class' => (($controller == "member" || $controller == "abandoned") && $action != "export-users") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-magnifier"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Active Only', 'url' => Url::to(['/member/state/active'],true), "options"=> ['class' => $state == "active" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Inactive Only', 'url' => Url::to(['/member/state/inactive'],true), "options"=> ['class' => $state == "inactive" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Expired Only', 'url' => Url::to(['/member/state/expired'],true), "options"=> ['class' => $state == "expired" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Upgrade Only', 'url' => Url::to(['/member/state/upgrade'],true), "options"=> ['class' => $state == "upgrade" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Custom Only', 'url' => Url::to(['/member/state/custom'],true), "options"=> ['class' => $state == "custom" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Abandoned', 'url' => Url::to(['/abandoned'],true), "options"=> ['class' => $controller == "abandoned" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Newsletter Only', 'url' => Url::to(['/member/subscriber'],true), "options"=> ['class' => $action == "subscriber" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'By Zip Code', 'url' => Url::to(['/member/state/byzip'],true), "options"=> ['class' => $state == "byzip" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				   'activeCssClass'=>'active',
				],
				[
					'label' => 'Transactions', 
					'url' => Url::to(['transactions/index'], true),
					'options' => ["class"=> ($controller == "transactions" || $controller == "temp-tenant-details") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-wallet"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Orders', 'url' => Url::to(['/transactions/index'], true), "options"=> ["class"=> $action == "index" && $controller == "transactions" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						[
						   'label' => 'Incomplete Orders', 
							'url' => Url::to([ '/temp-tenant-details'], true),
							'options' => ['class' => $controller == "temp-tenant-details" ? ' nav-item active':'nav-item'], 
							'template' => '<a href="{url}" class="nav-link nav-toggle">
									<span class="title">{label}</span>
								</a>',
						],
						['label' => 'Source / Medium', 'url' => Url::to(['/transactions/source-medium'], true), "options"=> ["class"=> $action == "source-medium" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Void / Refund', 'url' =>Url::to(['/transactions/void-refund-summary'], true), "options"=> ["class"=>$action == "void-refund-summary" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						[
							'label' => 'Forms Ordered', 
							'url' => Url::to(['/landlordform-user'], true),
							'options' => ['class' => ($controller == "landlordform-user") ? ' nav-item open':'nav-item'], 
							'template' => '<a href="{url}" class="nav-link nav-toggle">
									<span class="title">{label}</span>
								</a>',
						],
					  ],
			    ],
				[
					'label' => 'Stats', 
					'url' => Url::to(['/stat/option'],true),
					'options' => ['class' => ($controller == "stat") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-bar-chart"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Options', 'url' => Url::to(['/stat/option'],true), "options"=> ['class' => $action == "option" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Renewals', 'url' => Url::to(['/stat/renewals'],true), "options"=> ['class' => $action == "renewals" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Registration', 'url' => Url::to(['/stat/registrations'],true), "options"=> ['class' => $action == "registrations" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Screening Reports', 'url' => Url::to(['/stat/reports'],true), "options"=> ['class' => $action == "reports" || $action == "stats-reports-details"  ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Forms', 'url' => Url::to(['/stat/forms'],true), "options"=> ['class' => $action == "forms"  ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Sources', 'url' => Url::to(['/stat/sources'],true), "options"=> ['class' => $action == "sources" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						], 
						['label' => 'Referrals', 'url' => Url::to(['/stat/refferals'],true), "options"=> ['class' => $action == "refferals" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						], 
						['label' => 'Guest User Purchase', 'url' =>  Url::to(['/stat/guest-user-purchase'],true), "options"=> ['class' => $action == "guest-user-purchase" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				],
				[
					'label' => 'Screening Search', 
					'url' => Url::to(['/credit-reports'],true),
					'options' => ["class"=>($controller == "credit-reports") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-magnifier"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				],
				[
					'label' => 'Promo', 
					'url' =>Url::to(['/promo-code'],true),
					'options' => ["class"=>($controller == "promo-code") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-present"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				],
				/* [
					'label' => 'Forms Ordered', 
					'url' => Url::to(['/landlordform-user'], true),
					'options' => ['class' => ($controller == "landlordform-user") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-note"></i>
							<span class="title"><strong>{label}</strong></span>
						</a>',
				], */
				[
					'label' => 'System Emails', 
					'url' => Url::to(['/system-email'], true),
					'options' => ['class' => ($controller == "system-email") ? ' nav-item open':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="icon-envelope"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
					'items' => [
						['label' => 'Registration', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'AAOA Free Member Registration', 'url' => Url::to(['/system-email/update?id=1'], true), "options"=> ["class"=> isset($_GET['id']) && $_GET['id'] == 1 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Join AAOA', 'url' => Url::to(['/system-email/update?id=76'], true), "options"=> ["class"=> isset($_GET['id']) && $_GET['id'] == 76 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'AAOA Value Member Registration', 'url' => Url::to(['/system-email/update?id=52'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 52 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '90 Day Free Trial Registration', 'url' => Url::to(['/system-email/update?id=68'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 68 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'FAQ Email', 'url' => Url::to(['/system-email/update?id=77'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 77 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'A Gift for You', 'url' => Url::to(['/system-email/update?id=78'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 78 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Upgrade', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span> </a>',
							'items' => [
								['label' => 'Value Member Upgrade', 'url' => Url::to(['/system-email/update?id=54'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 54 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Basic Member Upgrade', 'url' => Url::to(['/system-email/update?id=70'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 70 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Account', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Send Password Email', 'url' => Url::to(['/system-email/update?id=14'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 14 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Send Username Email', 'url' => Url::to(['/system-email/update?id=15'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 15 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Forgot Password', 'url' => Url::to(['/system-email/update?id=41'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 41 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Forgot Username', 'url' => Url::to(['/system-email/update?id=55'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 55 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Screening', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Activation / Approved', 'url' => Url::to(['/system-email/update?id=13'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 13 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Onsite Status', 'url' => Url::to(['/system-email/update?id=19'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 19 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Onsite Approval', 'url' => Url::to(['/system-email/update?id=20'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 20 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Onsite Expiring in 30 days', 'url' => Url::to(['/system-email/update?id=21'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 21 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Onsite Expiring in 7 days', 'url' => Url::to(['/system-email/update?id=22'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 22 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Onsite has expired', 'url' => Url::to(['/system-email/update?id=23'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 23 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'TenantSelect Requirements', 'url' => Url::to(['/system-email/update?id=28'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 28 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Direct Email Wrong', 'url' => Url::to(['/system-email/update?id=61'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 61 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'CBR TSP Code Email', 'url' => Url::to(['/system-email/update?id=72'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 72 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
							
						],
						['label' => 'Renewal', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span> </a>',
							'items' => [
								['label' => 'Limited Renewal', 'url' => Url::to(['/system-email/update?id=36'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 36 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Executive Renewal', 'url' => Url::to(['system-email/update?id=29'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 29 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Premium Renewal', 'url' => Url::to(['/system-email/update?id=37'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 37 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '30 days prior to renewal', 'url' => Url::to(['/system-email/update?id=12'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 12 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '7 days prior to renewal', 'url' => Url::to(['/system-email/update?id=13'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 13 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Unsuccessful Renewal', 'url' => Url::to(['/system-email/update?id=9'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 9 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'AAOA Membership Expired', 'url' => Url::to(['/system-email/update?id=11'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 11 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'AAOA Basic Member Renewal', 'url' => Url::to(['/system-email/update?id=69'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 69 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'AAOA Member Renewal', 'url' => Url::to(['/system-email/update?id=64'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 64 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Vendor', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle ">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Vendor Successful Renewal', 'url' => Url::to(['/system-email/update?id=31'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 31 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Vendor Unsuccessful Renewal', 'url' => Url::to(['/system-email/update?id=32'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 32 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Vendor Registration', 'url' => Url::to(['/system-email/update?id=5'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 5 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Directory Inquiry', 'url' => Url::to(['/system-email/update?id=88'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 88 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Forgot Password', 'url' => Url::to(['/system-email/update?id=42'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 42 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '7 days Renewal Reminder', 'url' => Url::to(['/system-email/update?id=43'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 43 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '30 days Renewal Reminder', 'url' => Url::to(['/system-email/update?id=44'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 44 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Forgot Username', 'url' => Url::to(['/system-email/update?id=56'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 56 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'SuperSaver', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle ">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'SuperSaver Subscription', 'url' => Url::to(['/system-email/update?id=45'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 45 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'SuperSaver Successful Renewal', 'url' =>Url::to(['/system-email/update?id=46'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 46 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'SuperSaver Unsuccessful Renewal', 'url' => Url::to(['/system-email/update?id=47'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 47 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '7 days Renewal Reminder', 'url' => Url::to(['/system-email/update?id=49'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 49 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '30 days Renewal Reminder', 'url' => Url::to(['/system-email/update?id=50'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 50 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Report', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle ">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Rental Application Request', 'url' => Url::to(['/system-email/update?id=57'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 57 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Report Ready Email', 'url' => Url::to(['/system-email/update?id=58'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 58 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Credit Report Pending', 'url' => Url::to(['/system-email/update?id=80'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 80 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Feedback Request', 'url' => Url::to(['/system-email/update?id=81'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 81 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Underwriting Information', 'url' => Url::to(['/system-email/update?id=82'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 82 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => '20% Off Tenant Screening', 'url' => Url::to(['/system-email/update?id=83'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 83 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
						['label' => 'Special Offer', 'url' => Url::to(['/system-email/update?id=87'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 87 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Home Depot Card', 'url' => Url::to(['/system-email/update?id=24'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 24 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Book Opt In', 'url' => Url::to(['/system-email/update?id=90'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 90 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Refer a Friend', 'url' => Url::to(['/system-email/update?id=84'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 84 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Refer a Friend From AAOA to Member', 'url' => Url::to(['/system-email/update?id=73'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 73 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Application to Rent', 'url' => Url::to(['/system-email/update?id=89'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 89 ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link ">{label}</a>',
						],
						['label' => 'Admin', 'url' => '#', "options"=> ["class"=>"nav-item"],
							'template' => '<a href="{url}" class="nav-link nav-toggle ">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Membership Updates in Admin Panel', 'url' => Url::to(['/system-email/update?id=85'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 85 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Email Address Updates in Admin Panel', 'url' => Url::to(['/system-email/update?id=86'], true), "options"=> ["class"=>isset($_GET['id']) && $_GET['id'] == 86 ? ' nav-item active':'nav-item'],
								'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
							],
						],
					],	
				],
				[
				'label' => 'Export New User', 
				'url' =>  Url::to(['/member/export-users'], true),
				'options' => ["class"=> $controller == 'member' && $action == "export-users" ? ' nav-item open':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-user"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
			/*	[
				'label' => 'Pricing Inventory', 
				'url' => Url::to(['/site/pricinginventory'], true),
				'options' => ['class' => $action == "pricinginventory" ? ' nav-item open':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-briefcase"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				 [
				'label' => 'Upsell Price', 
				'url' =>  Url::to(['/site/upsellprice'], true),
				'options' => ['class' => $action == "upsellprice" ? ' nav-item open':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="fa fa-dollar"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				], */
				[
					'label' => 'Logs', 
					'url' => '#',
					'options' => ["class"=>($controller == "errorlog" || $controller == "activitylogs" ||$controller == "entry" ||$controller == "error" || $controller == "cronjoblog") ? ' nav-item open':'nav-item'], 
					'activeCssClass' => 'open',
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-file-text"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Activity', 'url' => Url::to(['/audit/entry'], true), "options"=> ["class"=> $controller == "entry" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Cron Job', 'url' => '#', "options"=> ["class"=> $controller == "cronjoblog" ? ' nav-item open':'nav-item'],
							'template' => '<a href="{url}" class="nav-link nav-toggle">{label} <span class="arrow"></span></a>',
							'items' => [
								['label' => 'Cron Job Search', 'url' =>Url::to(['/cronjoblog'], true), "options"=> ["class"=> $controller == "cronjoblog" && $action == 'index' ? ' nav-item active':'nav-item'],
									'template' => '<a href="{url}" class="nav-link">{label}</a>',
								],
								['label' => 'Cron Job List', 'url' =>Url::to(['/cronjoblog/cron-list'], true), "options"=> ["class"=> $action == 'cron-list' ? ' nav-item active':'nav-item'],
									'template' => '<a href="{url}" class="nav-link">{label}</a>',
								]
							
							],
						],
						['label' => 'Error', 'url' =>Url::to(['/audit/error'], true), "options"=> ["class"=> $controller == "error" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				]
				,
				/* [
				'label' => 'Cron Job Log', 
				'url' => Url::to(['cronjoblog/index'], true),
				'options' => ["class"=> $controller == "cronjoblog" ? ' nav-item open':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="fa fa-file-text"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				], */
				[
				'label' => 'Referral', 
				'url' =>  Url::to(['/referal-coupon'], true),
				'options' => ['class' => $controller == "referal-coupon" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-user"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				[
				'label' => 'Header Phone', 
				'url' => Url::to(['/daytimephone/index']),
				'options' => ["class"=> $controller == "daytimephone" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-call-end"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				/*[
				'label' => 'Error Log', 
				'url' => Url::to(['/error-log'], true),
				'options' => ["class"=> $controller == "errorlog" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="fa fa-exclamation-triangle"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				 [
				'label' => 'Activity Log', 
				'url' =>  Url::to([ '/activity-log'], true),
				'options' => ["class"=>$controller == "activitylogs" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="fa fa-flag"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				], 
				[
				'label' => 'Incomplete Orders', 
				'url' => Url::to([ '/temp-tenant-details'], true),
				'options' => ['class' => $controller == "temp-tenant-details" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-basket"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				/* [
				'label' => 'Presidential Poll', 
				'url' => Url::to([ '/poll-candidate'], true),
				'options' => ['class' => $controller == "poll-candidate" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="fa fa-commenting-o"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				], */
				[
				'label' => 'Webinar Registrations', 
				'url' => Url::to([ '/webinar-registrations'], true),
				'options' => ["class"=> $controller == "webinar" ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-note"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				[
					'label' => 'Vendor Section', 
					'url' => '#', 
					'options' => ["class"=>$controller == "vendor" ? ' nav-item active':'nav-item'], 
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-users"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
					'items' => [
						['label' => 'Vendor Search', 'url' => Url::to([ '/vendor'], true), "options"=> ["class"=> $controller == "vendor" && $action =="index" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Abandoned', 'url' =>  Url::to([ '/vendor/abandoned'], true), "options"=> ["class"=> $action == "abandoned" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Categories', 'url' => Url::to([ '/vendor/categories'], true), "options"=> ["class"=> $action == "categories" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Transactions', 'url' =>  Url::to([ '/vendor/vendor-transaction'],true), "options"=> ["class"=> $action == "vendor-transaction" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Stats', 'url' => Url::to([ '/vendor/vendor-stats'],true), "options"=> ["class" => $action == "vendor-stats" ? "nav-item active" : "nav-item"],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Vendor Search Category', 'url' => Url::to([ '/vendor/vendor-by-category'], true), "options"=> ["class"=> $action == "vendor-by-category" ? "nav-item active" : "nav-item"],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				], 
				/* [
				'label' => 'Services', 
				'url' => Url::to(['inventory/services'], true),
				'options' => ["class"=> ($controller == "inventory" && $action == "services") ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-note"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				],
				[
				'label' => 'Packages', 
				'url' => Url::to(['inventory/packages'], true),
				'options' => ["class"=> ($controller == "inventory" && $action == "packages") ? ' nav-item active':'nav-item'], 
				'template' => '<a href="{url}" class="nav-link nav-toggle">
						<i class="icon-note"></i>
						<span class="title"><strong>{label}</strong></span>
					</a>',
				], */
				[
					'label' => 'Report Management', 
					'url' => Url::to(['/inventory/services'], true),
					'options' => ["class"=>($controller == "site" || $controller == "inventory") ? ' nav-item open':'nav-item'], 
					'activeCssClass' => 'open',
					'template' => '<a href="{url}" class="nav-link nav-toggle">
							<i class="fa fa-file-text"></i>
							<span class="title"><strong>{label}</strong></span>
							<span class="arrow"></span>
						</a>',
						'items' => [
						['label' => 'Individual', 'url' => Url::to(['/inventory/services'], true), "options"=> ["class"=> $controller == "inventory" && $action == "services" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Packages', 'url' => Url::to(['/inventory/packages'], true), "options"=> ["class"=> $controller == "inventory" && $action == "packages" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Price Chart', 'url' =>Url::to(['/site/pricinginventory'], true), "options"=> ["class"=> $controller == "site"  && $action == "pricinginventory" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
						['label' => 'Upsell Price', 'url' =>Url::to(['/site/upsellprice'], true), "options"=> ["class"=> $controller == "site" && $action == "upsellprice" ? ' nav-item active':'nav-item'],
							'template' => '<a href="{url}" class="nav-link">{label}</a>',
						],
					],
				],
				$AdminManagement
			],
			//'activeCssClass'=>'open',
			'submenuTemplate' => "\n<ul class='sub-menu ".$controller."'>\n{items}\n</ul>\n",
			'encodeLabels' => false, //allows you to use html in labels
			//'activateItems' => true,
			'activateParents' => true, 
			]);  ?>
	</div>	
</div>
<?php
$script = <<< JS

$(document).ready(function () {
	var state = '$state';
	
	var controller = '$controller';
	$(document).find('.open').children('a').children('span.arrow').addClass('open');
	$(document).find('.open').children('ul').show();
	$(document).find('.open').children('ul').find('.active').parent('ul').show().siblings('a').children('span').addClass('open').closest('li').addClass('open');
	
});

JS;
$this->registerJs($script);
?>
