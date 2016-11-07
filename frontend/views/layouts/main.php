<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
    <head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <title><?= Html::encode($this->title) ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php echo HTML::cssFile("@web/bootstrap/css/root.css", ['type' => 'text/css']); ?>

        <?php echo HTML::cssFile("@web/css/style.css", ['type' => 'text/css', 'media' => 'all']); ?>

        <?php echo HTML::cssFile("@web/css/slider.css", ['type' => 'text/css', 'media' => 'all']); ?>

        <?php echo HTML::jsFile("@web/js/jquery-1.7.2.min.js", ['type' => 'text/javascript']); ?>

        <?php echo HTML::jsFile("@web/js/move-top.js", ['type' => 'text/javascript']); ?>

        <?php echo HTML::jsFile("@web/js/easing.js", ['type' => 'text/javascript']); ?>

        <?php echo HTML::jsFile("@web/js/startstop-slider.js", ['type' => 'text/javascript']); ?>

        <?php echo Html::csrfMetaTags() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <div class="header">
                <div class="headertop_desc">
                    <div class="call">
                        <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
                    </div>
                    <div class="account_desc">
                        <ul>
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="<?php echo Url::to(['/user/signup']) ?>">注册</a></li>
                                <li><a href="<?php echo Url::to(['/user/signin']) ?>">登录</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo Url::to(['/user/index']) ?>"><?php echo Yii::$app->user->identity->user_name; ?>的账户</a></li>
                                <li><a href="<?php echo Url::to(['/user/signout']) ?>">登出</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="header_top">
                    <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt="" /></a>
                    </div>
                    <div class="cart">
                        <p><span>购物车:</span><div id="dd" class="wrapper-dropdown-2"> <b class="cart-quality">0</b> 件商品 - ￥<b class="cart-amount">0.00</b>
                            <ul class="dropdown cart-list">
                                <li>购物车中暂无商品</li>
                            </ul></div></p>
                    </div>
                    <script type="text/javascript">
                        function DropDown(el) {
                            this.dd = el;
                            this.initEvents();
                        }
                        DropDown.prototype = {
                            initEvents: function () {
                                var obj = this;

                                obj.dd.on('click', function (event) {
                                    $(this).toggleClass('active');
                                    event.stopPropagation();
                                });
                            }
                        }

                        $(function () {

                            var dd = new DropDown($('#dd'));

                            $(document).click(function () {
                                // all dropdowns
                                $('.wrapper-dropdown-2').removeClass('active');
                            });

                        });

                    </script>
                    <div class="clear"></div>
                </div>
                <div class="header_bottom">
                    <div class="menu">
                        <?php
                        $menuItems = [
                            ['label' => '首页', 'url' => ['/cart/index']],
                            ['label' => '关于我们', 'url' => ['/cart/checkout']],
                            ['label' => '联系我们', 'url' => ['/goods/index']],
                        ];
                        echo Nav::widget([
//     	     	    'options' => ['class' => 'navbar-nav navbar-right'],
                            'items' => $menuItems,
                        ]);
                        ?>
                    </div>
                    <div class="search_box">
                        <form>
                            <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Search';
                                    }"><input type="submit" value="">
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>	
            </div>
            <div class="main">
                <div class="content">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
<?= Alert::widget() ?>
<?= $content ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="wrap">	
                <div class="section group">
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Customer Service</a></li>
                            <li><a href="#">Advanced Search</a></li>
                            <li><a href="delivery.html">Orders and Returns</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Why buy from us</h4>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Customer Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="contact.html">Site Map</a></li>
                            <li><a href="#">Search Terms</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>My account</h4>
                        <ul>
                            <li><a href="contact.html">Sign In</a></li>
                            <li><a href="index.html">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="contact.html">Help</a></li>
                        </ul>
                    </div>
                    <div class="col_1_of_4 span_1_of_4">
                        <h4>Contact</h4>
                        <ul>
                            <li><span>+91-123-456789</span></li>
                            <li><span>+00-123-000000</span></li>
                        </ul>
                        <div class="social-icons">
                            <h4>Follow Us</h4>
                            <ul>
                                <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
                                <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
                                <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
                                <div class="clear"></div>
                            </ul>
                        </div>
                    </div>
                </div>			
            </div>
            <div class="copy_right">
                <p>Copyright &copy; 2014.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
            </div>
        </div>
        <script type="text/javascript">
            /**
             * 更新购物车
             */
            function updateCart() {
                var url = "<?php echo Url::to(['cart/getgeneral']) ?>";
                $.getJSON(url, function (data) {
                    console.log(data);
                    if (data.status == 2000) {
                        $(".cart-quality").html(data['data']['quality']);
                        $(".cart-amount").html(data['data']['amount']);
                        $(".cart-list").html(data['data']['list']);
                    }
                });
            }
            /**
             *删除商品
             */
            function deleteCart(that) {
                var id = $(that).data("id");
                var url = "<?php echo Url::to(["cart/delete"]) ?>";
                $.post(url, {'id': id}, function (data) {
                    console.log(data);
                    if (data.status == 2000) {
                        updateCart();
                    }
                });
            }

            $(document).ready(function () {
                updateCart();
            });
        </script>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
