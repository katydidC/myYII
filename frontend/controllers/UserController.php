<?php

namespace frontend\controllers;

use \yii\web\Controller;
use yii\base\Model;
use frontend\models\Users;
use Yii;
use yii\helpers\Url;
use frontend\models\UsersSearch;

class UserController extends Controller {

    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::to([
                        '/user/index'
            ]));
            return;
        }
        //获取ID
        $userid = Yii::$app->user->identity->user_id;
        //单人用户信息
        $Users = new Users();
        $userInfo = $Users::find()->where([
                    'user_id' => $userid
                ])->one();

        return $this->render('index', [
                    'userInfo' => $userInfo
        ]);
    }

    /**
     * 注册
     */
    public function actionSignup() {
        if (!Yii::$app->user->isGuest) {
            $this->redirect(Url::to([
                        '/user/index'
            ]));
            return;
        }
        // return $this->render("signup");
        $model = new Users();
        // 跳过了重复密码验证
        if (Yii::$app->request->getIsPost()) {
            $post = Yii::$app->request->post();
            $post["Users"]['password'] = md5($post["Users"]['password']['o']);
            if ($model->load($post)) {
                if ($model->validate()) {
                    // form inputs are valid, do something here
                    $model->save();
                    $this->redirect(Url::to([
                                "user/signin"
                    ]));
                    return;
                }
            }
        }
        return $this->render('signup', [
                    'model' => $model
        ]);
    }

    /**
     * 登录
     *
     * @return string
     */
    public function actionSignin() {
        $beforeLoginUrl = Yii::$app->session->get("beforeLoginUrl");
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

    /**
     * 登出
     */
    public function actionSignout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
