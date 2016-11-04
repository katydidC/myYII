<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%order_info}}".
 *
 * @property string $order_id
 * @property string $order_sn
 * @property string $user_id
 * @property integer $order_status
 * @property integer $shipping_status
 * @property integer $pay_status
 * @property string $consignee
 * @property integer $country
 * @property integer $province
 * @property integer $city
 * @property integer $district
 * @property string $address
 * @property string $zipcode
 * @property string $tel
 * @property string $mobile
 * @property string $email
 * @property string $best_time
 * @property string $sign_building
 * @property string $postscript
 * @property integer $shipping_id
 * @property string $shipping_name
 * @property integer $pay_id
 * @property string $pay_name
 * @property string $how_oos
 * @property string $how_surplus
 * @property string $pack_name
 * @property string $card_name
 * @property string $card_message
 * @property string $inv_payee
 * @property string $inv_content
 * @property string $goods_amount
 * @property string $shipping_fee
 * @property string $insure_fee
 * @property string $pay_fee
 * @property string $pack_fee
 * @property string $card_fee
 * @property string $money_paid
 * @property string $surplus
 * @property string $integral
 * @property string $integral_money
 * @property string $bonus
 * @property string $order_amount
 * @property integer $from_ad
 * @property string $referer
 * @property string $add_time
 * @property string $confirm_time
 * @property string $pay_time
 * @property string $shipping_time
 * @property integer $pack_id
 * @property integer $card_id
 * @property string $bonus_id
 * @property string $invoice_no
 * @property string $extension_code
 * @property string $extension_id
 * @property string $to_buyer
 * @property string $pay_note
 * @property integer $agency_id
 * @property string $inv_type
 * @property string $tax
 * @property integer $is_separate
 * @property string $parent_id
 * @property string $discount
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_info}}';
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
            'order_id' => 'Order ID',
            'order_sn' => 'Order Sn',
            'user_id' => 'User ID',
            'order_status' => 'Order Status',
            'shipping_status' => 'Shipping Status',
            'pay_status' => 'Pay Status',
            'consignee' => 'Consignee',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'best_time' => 'Best Time',
            'sign_building' => 'Sign Building',
            'postscript' => 'Postscript',
            'shipping_id' => 'Shipping ID',
            'shipping_name' => 'Shipping Name',
            'pay_id' => 'Pay ID',
            'pay_name' => 'Pay Name',
            'how_oos' => 'How Oos',
            'how_surplus' => 'How Surplus',
            'pack_name' => 'Pack Name',
            'card_name' => 'Card Name',
            'card_message' => 'Card Message',
            'inv_payee' => 'Inv Payee',
            'inv_content' => 'Inv Content',
            'goods_amount' => 'Goods Amount',
            'shipping_fee' => 'Shipping Fee',
            'insure_fee' => 'Insure Fee',
            'pay_fee' => 'Pay Fee',
            'pack_fee' => 'Pack Fee',
            'card_fee' => 'Card Fee',
            'money_paid' => 'Money Paid',
            'surplus' => 'Surplus',
            'integral' => 'Integral',
            'integral_money' => 'Integral Money',
            'bonus' => 'Bonus',
            'order_amount' => 'Order Amount',
            'from_ad' => 'From Ad',
            'referer' => 'Referer',
            'add_time' => 'Add Time',
            'confirm_time' => 'Confirm Time',
            'pay_time' => 'Pay Time',
            'shipping_time' => 'Shipping Time',
            'pack_id' => 'Pack ID',
            'card_id' => 'Card ID',
            'bonus_id' => 'Bonus ID',
            'invoice_no' => 'Invoice No',
            'extension_code' => 'Extension Code',
            'extension_id' => 'Extension ID',
            'to_buyer' => 'To Buyer',
            'pay_note' => 'Pay Note',
            'agency_id' => 'Agency ID',
            'inv_type' => 'Inv Type',
            'tax' => 'Tax',
            'is_separate' => 'Is Separate',
            'parent_id' => 'Parent ID',
            'discount' => 'Discount',
        ];
    }
}
