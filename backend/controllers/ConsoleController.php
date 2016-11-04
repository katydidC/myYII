<?php

namespace backend\controllers;

use \yii\web\Controller;
use yii\base\Model;
use backend\models\Users;
use Yii;
use yii\helpers\Url;

class ConsoleController extends Controller {

    public $layout = false;

    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * 登录
     */
    public function actionSignin() {
        $model = new Users();
        if (Yii::$app->request->getIsPost()) {
            $post = Yii::$app->request->post();
            var_dump($post);
            // 模型里验证登录状态
            $row = $model->login($post['Users']);
            // 如果登录成功，跳转到用户中心
            if ($row) {
                Yii::$app->session->remove("beforeLoginUrl");
                if (!empty($beforeLoginUrl)) {
                    header("Location:" . $beforeLoginUrl);
                    exit();
                } else {
                    $this->redirect([
                        "/user/index"
                    ]);
                }
            }
        }
        return $this->render("signin", [
                    'model' => $model
        ]);
    }

    public function actionSignup() {

        return $this->render('signup');
    }

    /**
     * 登出
     */
    public function actionSignout() {
        return $this->render('signout');
    }

}
