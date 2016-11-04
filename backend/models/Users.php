<?php

namespace backend\models;

use Yii;
use yii\web\Session;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author Administrator
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * 后台表名
     * @return string
     */
    public static function tableName() {
        return '{{%users}}';
    }

    /**
     * 请求规则
     * @return type
     */
    public function rules() {
        return [
            [['user_name'], 'required', 'message' => '用户名不能为空'],
            [['password'], 'required', 'message' => '密码不能为空'],
            [['password'], 'string', 'min' => 6, 'message' => '密码最少需要6位'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => 'User ID',
            'user_name' => '用户名',
            'password' => '密码',
        ];
    }

    public function login($user_arr) {
        $username = $user_arr['user_name'];
        $password = $user_arr['password'];
        $row = $this::find()->where([
                    'user_name' => $username
                ])->one();
        if (!$row) {
            return false;
        }
        if ($row['password'] != md5($password)) {
            return false;
        }

        Yii::$app->user->login($row, 3600);
        return true;
    }

    protected function findModel($id) {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findIdentity($id) {
        return static::findOne(['user_id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return false;
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public function getAuthKey() {
        return false;
    }

    public function validateAuthKey($authKey) {
        return false;
    }

}
