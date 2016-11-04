<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php if (Yii::$app->user->isGuest): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="kode-alert kode-alert-icon alert11">
                <i class="fa fa-warning"></i> 您还没有登录！登录后购物车的商品将保存到您账号中 <a
                    href="<?php echo Url::to(['user/signin']) ?>"
                    class="btn btn-rounded btn-danger">立即登录</a>
            </div>
        </div>
    </div>
<?php endif; ?>
<style>
    .cart-index-list  input {
        position: relative;
        top: -7px;
    }
</style>
<?php
$form = ActiveForm::begin([
            'action' => [
                'cart/checkout'
            ],
            'method' => 'post',
            'id' => 'form-cart-checkout'
        ]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title">购物车</div>
            <div class="panel-body table-responsive">
                <table class="table table-hover cart-index-list">
                    <thead>
                        <tr>
                            <td><input class="cart-index-checkall" type="checkbox"></td>
                            <td>商品</td>
                            <td>单价(元)</td>
                            <td>数量</td>
                            <td>小计(元)</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
<?php if (!empty($list)): foreach ($list as $key => $val): ?>
                                <tr>
                                    <td><input class="cart-index-check" type="checkbox" name="gid[]"
                                               value="<?php echo $val['goods_id']; ?>"
                                               data-quality=<?php echo $goods["g_" . $val['goods_id']]['quality']; ?>
                                               data-amount=<?php echo sprintf("%.2f", $goods["g_" . $val['goods_id']]['amount']); ?>></td>
                                    <td><?php echo $val['goods_name']; ?></td>
                                    <td><?php echo $val['shop_price']; ?></td>
                                    <td><?php echo $goods["g_" . $val['goods_id']]['quality']; ?></td>
                                    <td><?php echo sprintf("%.2f", $goods["g_" . $val['goods_id']]['amount']); ?></td>
                                    <td>删除</td>
                                </tr>
    <?php endforeach;
endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="kode-alert kode-alert-icon alert8-light">
            <span>已选择<b class="cart-index-quality">0</b>件商品
            </span><span>总价： ￥<b class="cart-index-amount">0</b></span>
<?= Html::submitButton('去结算', ['class' => 'btn btn-rounded btn-danger', 'id' => 'cart-checkout']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var isGuest = <?php echo intval(Yii::$app->user->isGuest); ?>;
    $("#cart-checkout").on("click", function () {
        if (isGuest) {
            alert("请登录");
            //省略弹出层细节
            return false;
        }
        var res = renderCartDisplay();
        var checked_cnt = res[0];
        //判断余额是否够用，省略不写了。
        //如果至少选中了一件商品，则提交
        if (checked_cnt > 0) {
            $("#form-cart-checkout").submit();
        } else {
            alert("至少选择一件商品");
            return false;
        }
    });

    //全选操作
    $(".cart-index-checkall").on("click", function () {
        //原来是选中状态，那么就该执行全清操作。
        if ($(this).prop("checked") == false) {
            $(this).prop("checked", false);
            $(".cart-index-check").prop("checked", false);
        } else {
            $(this).prop("checked", true);
            $(".cart-index-check").prop("checked", true);
        }
        renderCartDisplay();
    });

    $(".cart-index-check").on("click", function () {
        //全部checkbox个数
        var olen = $(".cart-index-check").length;
        //选中的个数
        var clen = 0;
        $.each($(".cart-index-check"), function () {
            if ($(this).prop("checked") !== false) {
                clen += 1;
            }
        });
        if (olen == clen) {
            $(".cart-index-checkall").prop("checked", true);
        } else {
            $(".cart-index-checkall").prop("checked", false);
        }

        renderCartDisplay();
    });

    //更改购买数量和总价值
    function renderCartDisplay() {
        //选中个数，商品数量，金额开始都是0
        var checked_cnt = checked_quality = checked_amount = 0;

        $.each($(".cart-index-check"), function () {
            if ($(this).prop("checked") == true) {
                checked_cnt += 1;
                checked_quality += parseInt($(this).data("quality"));
                checked_amount += parseFloat($(this).data("amount"));
            }
        });
        checked_amount = checked_amount.toFixed(2);
        $(".cart-index-quality").html(checked_quality);
        $(".cart-index-amount").html(checked_amount);
        return [checked_cnt, checked_quality, checked_amount];
    }

</script>