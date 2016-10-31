<?php

namespace frontend\controllers;

class GoodsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 商品详情
     */
    public function actionItem() {
    
    }
}
