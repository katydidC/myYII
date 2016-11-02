<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class IndexController extends Controller
{

    public function actionIndex()
    {
        echo \Yii::$app->request->baseUrl;
        echo Url::to(['category/index'], ['id' => 3]);
        return $this->render("index");
    }

    public function actionAboutus()
    {
        return $this->render("aboutus");
    }
    public function actionContact()
    {
        return $this->render("contact");
    }
}

?>