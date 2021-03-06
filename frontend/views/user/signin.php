<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Users */
/* @var $form ActiveForm */
?>
<div class="user-signup">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default">

                <div class="panel-title">
                    用户登录
                </div>

                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'user_name')->textInput(); ?>
                        <?= $form->field($model, 'password')->passwordInput(); ?>
                    <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
                    </div>
<?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- user-signup -->
