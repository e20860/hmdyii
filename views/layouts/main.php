<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use app\assets\AppAsset;
use app\assets\DefAsset;

$curRoute = Yii::$app->controller->route;
if($curRoute ==='site/index') {
    DefAsset::register($this);
} else {
    AppAsset::register($this);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php
Modal::begin([
    'header' => '<h2>Ваша корзина</h2>',
    'size' => 'modal-lg',
    'id' => 'hm-cart',
    'footer' => '
        <button type="button" class="btn btn-default buynext" data-dismiss="modal">Продолжить покупки</button>
        <button type="button" class="btn btn-success" id="toCart">Перейти к заказу</button>
        <button type="button" class="btn btn-danger" id="hmcClear">Очистить корзину</button>
        ',
]);

Modal::end();
?>
    
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif;?>
<?php if( Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif;?> 
    
<div class="wrap">
<header>
      <div class="container">
        <div class="row header_top">
          <div class="logo col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="/"><img src="/images/hmlogo.png"></a>
          </div>
          <div class="btn_top_wrap col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="btn_and_search">
              <div class="btn_top">
                <a href="/contact"><i class="glyphicon glyphicon-map-marker"></i>Обратная связь</a>
                <?php if(!Yii::$app->user->isGuest):?>
                    <?php if(Yii::$app->user->identity->access_token == 'admin'):?>
                        <a href="/admin"><i class="glyphicon glyphicon-user"></i>Редактирование</a>
                    <?php else: ?>
                        <a href="/about"><i class="glyphicon glyphicon-user"></i>Личный кабинет</a>
                    <?php endif;?>
                <a href="/logout">
                    <i class="glyphicon glyphicon-lock"></i>
                    <?= Yii::$app->user->identity->name?>&nbsp;(Выйти)
                </a>
                <?php else:?>
                <a href="/login"><i class="glyphicon glyphicon-lock"></i>Войти</a>
                <?php endif;?>
              </div>
              <div class="search_top">
                  <form action="/items/search" method="get">
	                <input placeholder="Поиск" type="text" name="srch">
	                <button type="submit" name="submit_search">
	                  <i class="glyphicon glyphicon-search"></i>
	                </button>
                </form>
              </div>
            </div>
            <div class="cart_top">
                <a href="#" id="cart-top">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span id="cart-qty"><?= isset($_SESSION['cart.qty'])?$_SESSION['cart.qty']:0;?></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    <div class="container-fluid menu_top" id="menutop">
            <div class="row">
                <?php
                NavBar::begin(['brandImage' => '/images/hmd1_logo.gif']);
                echo Nav::widget([
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'Куклы', 'url' => ['/items/category?id=1']],
                        ['label' => 'Выкройки', 'url' => ['/items/category?id=2']],
                        ['label' => 'Наборы', 'url' => ['/items/category?id=3']],
                        ['label' => 'Мастер-классы', 'url' => ['/items/category?id=4']],
                        ['label' => 'О нас', 'url' => ['/site/about']],
                    ],
                    'options' => [
                        'class' => 'nav navbar-nav',
                        ],
                ]);
                NavBar::end();
                ?>
            </div>  
      </div>
    </header>
    <?= Alert::widget()?>
    <?= $content?>
    <div class="container-fluid write_email_and_sseti">
      <div class="container">
        <div class="row write_email_and_sseti_wrap">
          <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 write_email">
              <p>&copy;&nbsp; HMdoll&nbsp; 2019 &nbsp;<i class="fa fa-circle-o-notch"></i></p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs sseti_wrap">
            <div>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-vk"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>    
   <div class="container-fluid footer">
    	<div class="container">
            <div class="row menu_footer_and_contact">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_menu">
                        <h3><i class="fa fa-shopping-bag"></i>&nbsp;Категории</h3>
                        <ul>
                            <li><a href="<?= Url::to(['/items/category','id'=>1])?>">Куклы</a></li>
                            <li><a href="<?= Url::to(['/items/category','id'=>2])?>">Выкройки</a></li>
                            <li><a href="<?= Url::to(['/items/category','id'=>3])?>">Наборы</a></li>
                            <li><a href="<?= Url::to(['/items/category','id'=>4])?>">Мастер-классы</a></li>
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <h3><i class="fa fa-info-circle"></i>&nbsp;Информация </h3>
		    	<ul>
                            <li><a href="<?= Url::to(['/info/delivery'])?>">Доставка</a></li>
                            <li><a href="<?= Url::to(['/info/how-to-pay'])?>">Оплата</a></li>
                            <li><a href="<?= Url::to(['/site/about'])?>">О нас</a></li>
		    	</ul>
                    </div>
                    <div class="footer_menu">
                        <h3><i class="fa fa-user"></i>&nbsp;Учетная запись</h3>
		    	<ul>
                            <li><a href="#">Войти</a></li>
                            <li><a href="#">Зарегистрироваться</a></li>
                            <li><a href="#">Мои заказы</a></li>
                            <li><a href="#">Список желаний</a></li>
                        </ul>
                    </div>
	    	</div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
                    <h3><i class="fa fa-globe"></i>&nbsp;Контакты</h3>
                    <p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Краузе, 17 г. Новосибирск, 630061</p>
                    <p><i class="glyphicon glyphicon-phone-alt"></i>Служба поддержки: 8 (913) 911-55-10</p>
                    <p><i class="glyphicon glyphicon-envelope"></i>E-mail: hm.doll@yandex.ru</p>
                </div>
	    </div>
	    	<div class="row">
	    		<div class="col-lg-12 copy">
                            <p>© 2019 <?= Html::a('hmdoll.ru', Url::to('/'))?></p>
	    		</div>
    		</div>
    	</div>
    </div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
