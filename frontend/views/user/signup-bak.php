<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $form ActiveForm */
?>
<div class="user-signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sex') ?>
        <?= $form->field($model, 'pay_points') ?>
        <?= $form->field($model, 'rank_points') ?>
        <?= $form->field($model, 'address_id') ?>
        <?= $form->field($model, 'reg_time') ?>
        <?= $form->field($model, 'last_login') ?>
        <?= $form->field($model, 'visit_count') ?>
        <?= $form->field($model, 'user_rank') ?>
        <?= $form->field($model, 'is_special') ?>
        <?= $form->field($model, 'parent_id') ?>
        <?= $form->field($model, 'flag') ?>
        <?= $form->field($model, 'is_validated') ?>
        <?= $form->field($model, 'birthday') ?>
        <?= $form->field($model, 'last_time') ?>
        <?= $form->field($model, 'user_money') ?>
        <?= $form->field($model, 'frozen_money') ?>
        <?= $form->field($model, 'credit_line') ?>
        <?= $form->field($model, 'alias') ?>
        <?= $form->field($model, 'msn') ?>
        <?= $form->field($model, 'qq') ?>
        <?= $form->field($model, 'office_phone') ?>
        <?= $form->field($model, 'home_phone') ?>
        <?= $form->field($model, 'mobile_phone') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'user_name') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'question') ?>
        <?= $form->field($model, 'answer') ?>
        <?= $form->field($model, 'passwd_answer') ?>
        <?= $form->field($model, 'last_ip') ?>
        <?= $form->field($model, 'ec_salt') ?>
        <?= $form->field($model, 'salt') ?>
        <?= $form->field($model, 'passwd_question') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-signup -->
