<?php

namespace frontend\controllers;

use Yii;
use yii\base\Object;
use yii\helpers\Url;

class UserbaseController extends \yii\web\Controller {

    public function init() {
        $this->verify();
    }

    public function verify() {
        if (Yii::$app->user->isGuest) {
            $url = Url::to(['/user/signin']);
            //登录之前的地址
            $beforeLoginUrl = Yii::$app->request->getAbsoluteUrl();
            Yii::$app->session->set("beforeLoginUrl", $beforeLoginUrl);
            header("Location:" . $url);
            //遗留问题
//             $this->redirect(['/user/signin']);
            exit();
        }
    }

}
