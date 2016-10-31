<?php
namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{

    public function actionIndex()
    {
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