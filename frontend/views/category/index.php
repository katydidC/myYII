<?php
use yii\widgets\LinkPager;
use yii\base\Widget;
use yii\helpers\Url;
?>

<div class="content_top">
	<div class="back-links">
		<p>
			<a href="index.html">主页</a> &gt;&gt;<a href="#"><?php echo $catInfo->cat_name; ?></a>
		</p>
	</div>
	<div class="clear"></div>
</div>

<div class="section group">
	<?php foreach ($list as $key => $val): ?>
	<div class="grid_1_of_4 images_1_of_4">
		<a href="preview.html"><img src="<?php echo $val['goods_img'];?>" alt=""></a>
		<h2><?php echo $val['goods_name'];?></h2>
		<div class="price-details">
			<div class="price-number">
				<p>
					<span class="rupees"><?php echo $val['shop_price'];?></span>
				</p>
			</div>
			<div class="add-cart">
				<h4>
					<a class="cart-go" href="javascript:void(0);" data-id=<?php echo $val['goods_id']; ?>>购物车</a>
				</h4>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div class="content-pagenation">
<?php echo LinkPager::widget(['pagination' => $pages]); ?>
</div>
<script type="text/javascript">
//加入购物车
var cartUrl = "<?php  echo Url::to(['cart/add'])?>";
$(".cart-go").on("click", function(){
	var id = $(this).data("id");
	$.post(cartUrl, {goodsid: id}, function(data){
		alert(data.message);
		updateCart();
	});
});


</script>
