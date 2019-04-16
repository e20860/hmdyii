<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
                <a href="/about"><i class="glyphicon glyphicon-user"></i>Личный кабинет</a>
                <a href="/login"><i class="glyphicon glyphicon-lock"></i>Войти</a>
              </div>
              <div class="search_top">
              	<form>
	                <input placeholder="Поиск" type="text">
	                <button type="submit" name="submit_search">
	                  <i class="glyphicon glyphicon-search"></i>
	                </button>
                </form>
              </div>
            </div>
            <div class="cart_top">
              <a href="/items/cart">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span>0</span>
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
   <div class="container-fluid footer">
    	<div class="container">
    		<div class="row menu_footer_and_contact">
	    		<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	    			<div class="footer_menu">
		    			<h3>Категории</h3>
		    			<ul>
		    				<li><a href="#">Куклы</a></li>
		    				<li><a href="#">Выкройки</a></li>
		    				<li><a href="#">Наборы</a></li>
		    				<li><a href="#">Мастер-классы</a></li>
		    				<li><a href="#">Сувениры</a></li>
		    			</ul>
	    			</div>
	    			<div class="footer_menu">
		    			<h3>Информация</h3>
		    			<ul>
		    				<li><a href="#">Доставка</a></li>
		    				<li><a href="#">Оплата</a></li>
		    				<li><a href="#">О компании</a></li>
		    				<li><a href="#">Скидки</a></li>
		    				<li><a href="#">Карта сайта</a></li>
		    			</ul>
	    			</div>
	    			<div class="footer_menu">
		    			<h3>Учетная запись</h3>
		    			<ul>
		    				<li><a href="#">Войти</a></li>
		    				<li><a href="#">Зарегистрироваться</a></li>
		    				<li><a href="#">Мои заказы</a></li>
		    				<li><a href="#">Список желаний</a></li>
		    			</ul>
	    			</div>
	    		</div>
	    		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
	    			<h3>Контакты</h3>
	    			<p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Краузе, 17 г. Новосибирск, 630061</p>
	    			<p><i class="glyphicon glyphicon-phone-alt"></i>Служба поддержки: 8 (913) 911-55-10</p>
	    			<p><i class="glyphicon glyphicon-envelope"></i>E-mail: hmdoll@myshop.ru</p>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-lg-12 copy">
	    			<p>© 2019 не является действующим интернет-магазином</p>
	    		</div>
    		</div>
    	</div>
    </div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
