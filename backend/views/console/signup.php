<?php
use yii\helpers\Url;
$path = 'http://' . $_SERVER['HTTP_HOST'] . '/YII/backend/web/bcsign/';
define('__KPATH__', $path);
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Katydid注册页面</title>
    <link rel="stylesheet" href="<?= __KPATH__ ?>css/style.css">
    <body>

        <div class="register-container">
            <h1>Katydid注册页面</h1>

            <div class="connect">
                <p>欢迎来到Katydid注册页面</p>
            </div>

            <form action="" method="post" id="registerForm">
                <div>
                    <input type="text" name="username" class="username" placeholder="您的用户名" autocomplete="off"/>
                </div>
                <div>
                    <input type="password" name="password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" />
                </div>
                <div>
                    <input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" />
                </div>
                <div>
                    <input type="text" name="phone_number" class="phone_number" placeholder="输入手机号码" autocomplete="off" id="number"/>
                </div>
                <div>
                    <input type="email" name="email" class="email" placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
                </div>

                <button id="submit" type="submit">注 册</button>
            </form>
            <a href="<?= Url::to(['/console/signin']) ?>">
                <button type="button" class="register-tis">已经有账号？</button>
            </a>

        </div>

    </body>
    <script>
        var APP_URL = "<?= __KPATH__ ?>";
    </script>
    <script src="<?= __KPATH__ ?>js/jquery.min.js"></script>
    <script src="<?= __KPATH__ ?>js/common.js"></script>
    <script src="<?= __KPATH__ ?>js/supersized.3.2.7.min.js"></script>
    <!--背景图片自动更换-->
    <script src="<?= __KPATH__ ?>js/supersized-init.js"></script>
    <!--表单验证-->
    <script src="<?= __KPATH__ ?>js/jquery.validate.min.js?var1.14.0"></script>
</html>