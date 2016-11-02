<?php
use yii\bootstrap\Html;
?>
<div class="row">
	<div class="col-md-6 col-lg-6">
		<div class="panel panel-default">

			<div class="panel-title">基本信息</div>
			<div class="panel-body">
				<p>昵称：<?php echo $userInfo->user_name;?></p>
				<p>余额：￥<?php echo $userInfo->user_money;?></p>
				<p>冻结金额：￥<?php echo $userInfo->frozen_money;?></p>
				<p>信用：<?php echo $userInfo->user_rank;?></p>
				<p>最近登录时间：<?php echo $userInfo->last_login;?></p>
				<p>最近登录IP：<?php echo $userInfo->last_ip;?></p>
			</div>
			<div class="panel-footer">
			<?= Html::a('详细信息', ['user/detail'], ['class' => 'btn btn-success'])?>
		</div>
		</div>

	</div>
</div>