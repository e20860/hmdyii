<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $session array */

$pathBack = Yii::$app->request->referrer;
$cartQty = $session['cart.qty']?$session['cart.qty']:0;
$cartSum = $session['cart.sum']?$session['cart.sum']:0;
?>
<?php $form = ActiveForm::begin()?>
    <div class="container">
        <div class="row">
	    <div class="contant_wrap">
            <div class="col-lg-12">
  	    	<div class="navigation">
                    <ul>
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><span>Оформление</span></li>
  		    </ul>
  		</div>
            </div>
	</div>
    	</div>
        <div class="row cart_wrap">
        <div class="col-lg-12 top_cart_block">
          <div>
            <p>ОФОРМЛЕНИЕ ЗАКАЗА</p>
            <p>Заказываемое количество товаров: <?= $cartQty ?></p>
          </div>
        </div>
        <div class="col-lg-12">
          <ul class="cart_status">
            <li><span>1. Проверка корзины</span></li>
            <li class="active"><span>2. Оформление заказа</span></li>
            <li><span>3.Завершение / оплата</span></li>
          </ul>
        </div>
        <div class="col-lg-6">
            <p class="h4 text-center">Содержание заказа</p>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Наименование</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($session['cart'])): ?>
                        <?php foreach ($session['cart'] as $id => $item):?>
                        <tr>
                            <td><?= yii\helpers\Html::img("/images/{$item['img']}", [
                                'alt' => $item['name'],
                                'height' => 30,
                            ]) ?></td>
                            <td><?=$item['name']?></td>
                            <td><?=$item['qty']?></td>
                            <td><?=$item['price']?></td>
                        </tr>
                        <?php endforeach;?>
                        <tr>
                            <td colspan="2">Итого, единиц:</td>
                            <td><?=$session['cart.qty']?></td>
                        </tr>
                        <tr>
                            <td colspan="3">Сумма:</td>
                            <td><?=$session['cart.sum']?></td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <p class="h4 text-center">Данные для оформления</p>
            
            <?= $form->field($order, 'name')->textInput(); ?>
            <?= $form->field($order, 'email')->textInput(); ?>
            <?= $form->field($order, 'phone')->textInput(); ?>
            <?= $form->field($order, 'address')->textarea(); ?>
            
            
        </div>
        <div class="col-lg-12 btn_cart_wrap">
            <hr>
        </div>
            
          <div class="col-lg-12 btn_cart_wrap">
            <a href="<?= $pathBack; ?>" class="btn_cart_im">
                <i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки
            </a>
            <?php if($cartSum >0): ?>  
              <?= Html::submitButton('Подтвердить заказ<i class="glyphicon glyphicon-chevron-right"></i>',
                      ['class' =>'btn btn_cart_zakaz']);?>
            <?php endif;?>  
          </div>
        </div>
      </div>
    </div>
<?php ActiveForm::end()?>