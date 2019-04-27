<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $session array */

$pathBack = Yii::$app->request->referrer;
$cartQty = $session['cart.qty']?$session['cart.qty']:0;
$cartSum = $session['cart.sum']?$session['cart.sum']:0;
?>
<form>
    <div class="container">
        <div class="row">
	    <div class="contant_wrap">
            <div class="col-lg-12">
  	    	<div class="navigation">
                    <ul>
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><span>Корзина</span></li>
  		    </ul>
  		</div>
            </div>
	</div>
    	</div>
        <div class="row cart_wrap">
        <div class="col-lg-12 top_cart_block">
          <div>
            <p>Состояние корзины</p>
            <p>Количество товаров в корзине: <?= $cartQty ?></p>
          </div>
        </div>
        <div class="col-lg-12">
          <ul class="cart_status">
            <li class="active"><span>1. Проверка корзины</span></li>
            <li><span>2. Оформление заказа</span></li>
            <li><span>3. Завершение / оплата</span></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <table class="table table-bordered">
            <tr class="cart_prod_head">
              <td class="img_cart">Товар</td>
              <td class="title_cart">Описание</td>
              <td class="price_cart">Цена за единицу</td>
              <td class="value_cart">Количество</td>
              <td class="rez_price_cart">Стоимость</td>
            </tr>
            <?php if(!isset($session['cart'])):?>
                <h2 class="title_cart text-danger">Корзина пуста</h2>
            <?php else: ?>
            <?php foreach ($session['cart'] as $id => $item):?>
            <tr class="cart_prod_content">
              <td class="img_cart"><?= Html::img("/images/{$item['img']}", [
                    'alt' => $item['name'],
                ]) ?></td>
              <td class="title_cart">
                  <a href="<?= Url::to(['/items/prod','id'=>$id])?>">
                      <?=$item['name']?>
                  </a>
              </td>
              <td class="price_cart"><?=$item['price']?> руб</td>
              <td class="value_cart"><?=$item['qty']?></td>
              <td class="rez_price_cart"><?=$item['price'] * $item['qty']?> руб</td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
            <tr class="cart_prod_footer">
              <td colspan="2" class="null_cart"></td>
              <td colspan="2" class="rez_title_cart">Итого, к оплате:</td>
              <td class="rez_price_cart"><?=$cartSum?> руб</td>
            </tr>
          </table>
          </div>
          <div class="col-lg-12 btn_cart_wrap">
            <a href="<?= $pathBack; ?>" class="btn_cart_im">
                <i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки
            </a>
            <?php if($cartSum >0): ?>  
              <a href="<?= Url::to('/order/checkout')?>" class="btn_cart_zakaz">
                Оформить заказ
                <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
            <?php endif;?>  
          </div>
        </div>
      </div>
    </div>
    </form>