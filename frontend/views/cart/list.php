<?php use yii\helpers\Url;
if(!empty($list)): foreach ($list as $key =>$val): ?>
<li>
	<div class="p-img fl">
		<a href="<?php echo Url::to(['goods/item'], ['id' => $val['goods_id']]); ?>" target="_blank"><img src="<?php echo $val['goods_thumb']; ?>" alt="" width="50" height="50"></a>
	</div>
	<div class="p-name fl">
		<a href="<?php echo Url::to(['goods/item'], ['id' => $val['goods_id']]); ?>" title="<?php echo $val['goods_name']; ?>" target="_blank"><?php echo $val['goods_name']; ?></a>
	</div>
	<div class="p-detail fr ar">
		<span class="p-price"><strong>￥<?php echo $val['shop_price']; ?></strong> x <?php echo $goods['g_' . $val['goods_id']]['quality'];?></span>
		<br>
		<a class="cart-delete" data-id="<?php echo $val['goods_id']; ?>" data-type="RemoveProduct" href="javascript:void(0)" onclick="deleteCart(this);">删除</a>
	</div>
</li>
<?php endforeach; endif; ?>
<li class="smb"><a href="<?php echo Url::to(['cart/index'])?>" title="去购物车" id="btn-payforgoods">去购物车</a></li>

