<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<div class="info-how-to-pay short_description">
    <div class="row">
        <div class="contant_wrap">
            <div class="col-lg-12">
                <div class="navigation">
                    <ul>
                        <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><span>Порядок оплаты</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container filter">
            <h2 class="text-center"><i class="fa fa-money"></i>&nbsp;&nbsp;Порядок оплаты:</h2>
            <div class="row">
		<div class="col-md-3">
                    <?= Html::img('/images/payment.jpg', 
                        ['class'=>'img-responsive','alt'=>'how to pay'])?>
                </div>
		<div class="col-md-9 text-left">
                    <p>При приобретении наших товаров Вы можете использовать следующие виды оплаты:</p>  
                    <br>
                    <p><i class="fa fa-rouble"></i>&nbsp;&nbsp;&nbsp;Наличный расчет (при доставке по Новосибирску)</p>
                    <p><i class="fa fa-credit-card-alt"></i>&nbsp;Перевод на карту <a href="https://online.sberbank.ru/CSAFront/index.do">Сбербанка</a> 4276 4406 1359 7084</p>
                    <p><i class="fa fa-rouble"></i>&nbsp;&nbsp;&nbsp;Наложенный платеж (при доставке Почтой России)</p>
                    <p><i class="fa fa-yahoo"></i>&nbsp;&nbsp;&nbsp;Перевод на кошелёк <a href="https://money.yandex.ru/to/410017308170797">Яндекс.Деньги</a></p>
                    <p><i class="fa fa-paypal"></i>&nbsp;&nbsp;&nbsp;Использовать платёжную систему <a href="https://www.paypal.me/SlavkoEvg?ppid=PPC000628&cnac=RU&rsta=ru_RU(ru_RU)&cust=VSREALSFADMXL&unptid=6d880c92-125f-11e9-bfb3-441ea1479d80&t=&cal=c8fbc53ea959b&calc=c8fbc53ea959b&calf=c8fbc53ea959b&unp_tpcid=ppme-social-user-profile-created&page=main:email&pgrp=main:email&e=op&mchn=em&s=ci&mail=sys">PayPal</a></p>
		</div>
            </div>
        </div>
      </div>

</div>