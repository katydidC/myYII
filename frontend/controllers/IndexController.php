<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use Yii;

class IndexController extends Controller {

    public function actionIndex() {
        echo \Yii::$app->request->baseUrl;
        echo Url::to(['category/index'], ['id' => 3]);
        return $this->render("index");
    }

    public function actionAboutus() {
        return $this->render("aboutus");
    }

    public function actionContact() {
        return $this->render("contact");
    }

    public function actionSetcache() {
        Yii::$app->cache->set("hello", "HELLEE", 60);
        Yii::$app->cache->set("helo", "aaaa", 60);
    }

    public function actionGetcache() {
        $var = Yii::$app->cache->get("hello");

        var_dump($var);
    }

}

?>