<?php
namespace frontend\controllers;

use Yii;
use yii\base\Object;

class UserbaseController extends \yii\web\Controller
{
    public function __construct() {
        $this->verify();
    }

    public function verify()
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['user/signin']);
        }
    }
}
