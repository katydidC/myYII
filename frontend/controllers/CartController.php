<?php
namespace frontend\controllers;

use yii\helpers\Url;
use Yii;
use frontend\models\Goods;
use yii\helpers\Json;
use yii\db\Query;

class CartController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $goods = Yii::$app->session->get("goods");
        $quality = $amount = 0;
        $list = [];
        $GoodsModel = new Goods();
        if (!empty($goods)) {
            foreach ($goods as $key => $val) {
                $quality += $val['quality'];
                $amount += $val['amount'];
                $list[$val['goodsid']] = $GoodsModel::find()->where([
                    'goods_id' => $val['goodsid']
                ])->one();
            }
        }
        $this->view->title = "购物车";
        return $this->render('index', [
            'quality' => $quality,
            'amount' => $amount,
            'list' => $list,
            'goods' =>$goods
        ]);
    }

    /**
     * 加入购物车
     */
    public function actionAdd()
    {
        // 1. 获取post goodsid，
        // 2. 容错，判断GOODS存在不存在
        // 3. 显示在页面的购物车
        if (Yii::$app->request->isPost) {
            $goodsid = Yii::$app->request->post("goodsid");
            $quality = Yii::$app->request->post("quality", 1);
            if (! $goodsid) {
                // 做点什么
                return;
            }
            $GoodsModel = new Goods();
            $goodsInfo = $GoodsModel::find()->where([
                'goods_id' => $goodsid
            ])->one();
            if (! $goodsInfo) {
                // 在做点什么
                return;
            }
            
            $row = $this->_cart($goodsInfo, $quality);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $row;
        }
    }

    /**
     */
    private function _cart($goodsInfo, $quality = 1)
    {
            // 1. 如果之前已经加入过此商品，那么只要再加一个就行了。
            // 2. 如果之前没有加入此商品，加一个
            // 3. 商品的数量要增加，同时显示的商品的总价格也要增加
//         $_SESSION = [
//             'goods' => [
//                 'g_10' => [
//                     'goodsid' => 10,
//                     'price' => 100,
//                     'quality' => 3,
//                     'amount' => 300
//                 ],
//                 'g_8' => [
//                     'goodsid' => 8,
//                     'price' => 10,
//                     'quality' => 2,
//                     'amount' => 20
//                 ]
//             ]
//         ];
        
        // 获取sesssion中goods,给个[]默认值，容错
        $session_goods = Yii::$app->session->get("goods", []);
        // session中goods_id要加前缀，避免key被覆盖
        $s_goods_id = "g_" . $goodsInfo['goods_id'];
        // 是否存在某一个商品的记录
        $item = ! empty($session_goods[$s_goods_id]) ? $session_goods[$s_goods_id] : null;
        
        // $data['goodsid'] = $goodsInfo['goods_id'];
        // $data['price'] = $goodsInfo['shop_price'];
        // if (!$item) {
        // $data['quality'] = $quality;
        // } else {
        // $data['quality'] = $item['quality'] + $quality;
        // }
        // $data['amount'] = $goodsInfo['shop_price'] * $quality;
        
        // 如果不存在商品记录，直接添加记录
        if (! $item) {
            $data = [
                $s_goods_id => [
                    'goodsid' => $goodsInfo['goods_id'],
                    'price' => $goodsInfo['shop_price'],
                    'quality' => $quality,
                    'amount' => $goodsInfo['shop_price'] * $quality
                ]
            ];
        } else {
            // 商品数量增加
            $data = [
                $s_goods_id => [
                    'goodsid' => $goodsInfo['goods_id'],
                    'price' => $goodsInfo['shop_price'],
                    'quality' => $item['quality'] + $quality,
                    'amount' => $goodsInfo['shop_price'] * ($item['quality'] + $quality)
                ]
            ];
        }
        // 重新生成SESSION的goods值
        $session_goods_new = array_merge($session_goods, $data);
        Yii::$app->session->set("goods", $session_goods_new);
        // var_dump($_SESSION);
        $message = [
            'status' => 2000,
            'message' => '加入购物车成功',
            'data' => []
        ];
        return $message;
    }

    /**
     * 购物车信息
     */
    public function actionGetgeneral() {
        //最终信息的模板
//         $message = [
//             'status' => 2000,
//             'message' => '获取购物车信息成功',
//             'data' => []            
//         ];
        $goods = Yii::$app->session->get("goods");
        $quality = $amount = 0;
        $list = [];
        $GoodsModel = new Goods();
        if (!empty($goods)) {
            foreach ($goods as $key => $val) {
                $quality += $val['quality'];
                $amount += $val['amount'];
                $list[$val['goodsid']] = $GoodsModel::find()->where([
                    'goods_id' => $val['goodsid']
                ])->one();
            }
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => 2000,
            'message' => 'success',
            'data' => [
                'quality' => $quality,
                'amount' => $amount,
                'list' => $this->renderPartial("list", [
                    'list' => $list,
                    'goods' => $goods
                ])
            ]
        ];
    }
    
    /**
     * 从购物车删除商品
     */
    public function actionDelete() {
        $id = Yii::$app->request->post("id");
        if (!$id) {
            return;
        }
        $goods = Yii::$app->session->get("goods");
        $goodsid = "g_". "$id";
        unset($goods[$goodsid]);
        Yii::$app->session->set("goods", $goods);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => 2000,
            'message' => 'success'
        ];
    }
    
    public function actionCheckout()
    {      
        if (Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $gids = $post['gid'];
            if (!$gids) {
                echo "参数错误！";
                die();
            }
            //1. 分别处理gid数组
            //2. 根据gid，获取商品的详细信息，重点需要价格
            //3. 根据gid，从session中获取商品数量
            //4. 计算某一个总额
            //不做余额判断
            //5. 生成订单，状态未支付
            //6. 从session中删除相应的购物车信息
            //7.如果更详细点，还可以加上订单日志表
        }
        var_dump($post);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}
