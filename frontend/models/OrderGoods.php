<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%order_goods}}".
 *
 * @property string $rec_id
 * @property string $order_id
 * @property string $goods_id
 * @property string $goods_name
 * @property string $goods_sn
 * @property string $product_id
 * @property integer $goods_number
 * @property string $market_price
 * @property string $goods_price
 * @property string $goods_attr
 * @property integer $send_number
 * @property integer $is_real
 * @property string $extension_code
 * @property string $parent_id
 * @property integer $is_gift
 * @property string $goods_attr_id
 */
class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => 'Rec ID',
            'order_id' => 'Order ID',
            'goods_id' => 'Goods ID',
            'goods_name' => 'Goods Name',
            'goods_sn' => 'Goods Sn',
            'product_id' => 'Product ID',
            'goods_number' => 'Goods Number',
            'market_price' => 'Market Price',
            'goods_price' => 'Goods Price',
            'goods_attr' => 'Goods Attr',
            'send_number' => 'Send Number',
            'is_real' => 'Is Real',
            'extension_code' => 'Extension Code',
            'parent_id' => 'Parent ID',
            'is_gift' => 'Is Gift',
            'goods_attr_id' => 'Goods Attr ID',
        ];
    }
}
