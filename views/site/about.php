<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="site-about short_description">
    <div class="row">
        <div class="contant_wrap">
            <div class="col-lg-12">
                <div class="navigation">
                    <ul>
                        <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><span>О нас</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container filter">
            <h2 class="text-center">О нас:</h2>
		  <div class="row">
		  <div class="col-md-3">
                    <?= Html::img('/images/master.jpg', 
                        ['class'=>'img-responsive','alt'=>'master'])?>
          </div>
		  <div class="col-md-9">
                      <p class="text-left">Продукция <strong>HMdoll</strong> — это уникальные разработки одного мастера. Здесь вы можете приобрести товары, ориентированные на любителей авторской игрушки с разными целями. <strong>Готовых кукол</strong> можно купить в подарок ценителю или для личной коллекции; <strong>выкройки</strong> будут полезны мастерам и любителям рукоделия; <strong>наборы и мастер-классы</strong> помогут всем желающим научиться самостоятельно шить текстильные игрушки..</p>
			  <p class="text-left">Преимуществом нашей продукции является разнообразие техник и стилей, которое позволяет подобрать товар под любой запрос. Отличительной чертой изделий, представленных в интернет-магазине, являются оригинальные технологические приемы изготовления игрушек. Регулярное пополнение ассортимента порадует постоянных покупателей. Радуйтесь творчеству вместе с нами! Ваш <strong>HMdoll</strong></p>
		  </div>
		  </div>
        </div>
      </div>

</div>
