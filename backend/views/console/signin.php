<?php

use yii\helpers\Url;

$path = 'http://' . $_SERVER['HTTP_HOST'] . '/YII/backend/web/bcsign/';
define('__KPATH__', $path);
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Katydid登录页面</title>

    <link rel="stylesheet" href="<?= __KPATH__ ?>css/style.css">

    <body>
        <!--<img src="http://localhost/YII/backend/web/bcsign/images/1.jpg">-->
        <div class="login-container">
            <h1>Katydid登录</h1>

            <div class="connect">
                <p>www.katydid.kantphp.com</p>
            </div>

            <form action="" method="post" id="loginForm">
                <div>
                    <input type="text" name="username" class="username" placeholder="用户名" autocomplete="off"/>
                </div>
                <div>
                    <input type="password" name="password" class="password" placeholder="密码" oncontextmenu="return false" onpaste="return false" />
                </div>
                <button id="submit" type="submit">登 陆</button>
            </form>

            <a href="<?= Url::to(['/console/signup']) ?>">
                <button type="button" class="register-tis">还有没有账号？</button>
            </a>

        </div>
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

        <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
            <p>Copyright &copy; <a target="_blank" href="#"><span style="color:red">Katydid</span></a></p>
        </div>
    </body>
</html>