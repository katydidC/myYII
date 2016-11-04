<?php

use yii\widgets\LinkPager;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">

            <div class="panel-title">我的订单</div>

            <div class="panel-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>订单编号</td>
                            <td>商品名称</td>
                            <td>单价</td>
                            <td>数量</td>
                            <td>总价</td>
                            <td>订单状态</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $statuss = [
                            1 => '未付款',
                            2 => '已付款',
                            3 => '已确认',
                            4 => '取消'
                        ];
                        ?>
<?php if (!empty($list)): foreach ($list as $key => $val): ?>
                                <tr>
                                    <td># <b><?php echo $val['goods_sn']; ?></b></td>
                                    <td><?php echo $val['goods_name']; ?></td>
                                    <td><?php echo $val['goods_price']; ?></td>
                                    <td><?php echo $val['goods_number']; ?></td>
                                    <td><?php echo $val['goods_amount']; ?></td>
                                    <td><?php echo $statuss[$val['order_status']]; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-rounded btn-default">详情</a>
                                        <?php if ($val['order_status'] == 1): ?>
                                            <a href="#" class="btn btn-rounded btn-default">付款</a>
                                        <?php endif; ?>
        <?php if (in_array($val['order_status'], [1, 2])): ?>
                                            <a href="#" class="btn btn-rounded btn-default">取消</a>
                                <?php endif; ?>
                                    </td>
                                </tr>
    <?php endforeach;
endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="content-pagenation">
<?php echo LinkPager::widget(['pagination' => $pages]); ?>
    </div>
</div>