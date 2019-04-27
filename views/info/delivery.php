<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="info-delivery short_description">
    <div class="row">
        <div class="contant_wrap">
            <div class="col-lg-12">
                <div class="navigation">
                    <ul>
                        <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><span>Доставка</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container filter">
            <h2 class="text-center"><i class="fa fa-truck"></i>&nbsp;&nbsp;Порядок доставки:</h2>
            <div class="row">
		<div class="col-md-3">
                    <?= Html::img('/images/delivery.jpg', 
                        ['class'=>'img-responsive','alt'=>'how to pay'])?>
                </div>
		<div class="col-md-9 text-left">
                    <p>При приобретении наших товаров мы предлагаем следующие виды доставки:</p>  
                    <br>
                    <p><i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;Электронные товары: скачивание с облачного хранилища по прямой ссылке</p>
                    <p><i class="fa fa-gift"></i>&nbsp;&nbsp;&nbsp;По Новосибирску: по предварительной договоренности (доставка до метро).</p>
                    <p><i class="fa fa-cube"></i>&nbsp;&nbsp;&nbsp;В любой город России: Почта России (бесплатно).</p>
                    <p><i class="fa fa-plane"></i>&nbsp;&nbsp;&nbsp;По всему миру: курьерская доставка за счет покупателя.</p>
		</div>
            </div>
        </div>
      </div>

</div>