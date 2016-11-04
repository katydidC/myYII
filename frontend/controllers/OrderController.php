<?php

namespace frontend\controllers;

use Yii;
use yii\db\Query;
use yii\data\Pagination;

class OrderController extends UserbaseController {

    public function actionIndex() {
        //总的订单数
        $count = (new Query())->from(Yii::$app->db->tablePrefix . "order_goods")->count();
        //订单列表
        $query = (new Query())
                ->where([
                    'user_id' => \Yii::$app->user->identity->user_id
                ])
                ->from(Yii::$app->db->tablePrefix . "order_goods og")
                ->leftJoin(Yii::$app->db->tablePrefix . "order_info oi", "og.order_id = oi.order_id")
                ->orderBy("oi.order_id DESC");
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => '10']);
        $list = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render("index", [
                    'list' => $list,
                    'pages' => $pages
        ]);
    }

}
