<?php

/* @var $this yii\web\View */

$this->title = 'Корзина';
?>
<form>
    <div class="container">
      <div class="row">
		    <div class="contant_wrap">
          <div class="col-lg-12">
  		    	<div class="navigation">
  		    		<ul>
  		    			<li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
  		    			<li><a href="#">Снаряжение</a></li>
  		    			<li><span>Рюкзаки</span></li>
  		    		</ul>
  		    	</div>
          </div>
		    </div>
    	</div>
      <div class="row cart_wrap">
        <div class="col-lg-12 top_cart_block">
          <div>
            <p>Состояние корзины</p>
            <p>Ваша корзина содержит: 1 товар</p>
          </div>
        </div>
        <div class="col-lg-12">
          <ul class="cart_status">
            <li class="active"><span>1. Заказ</span></li>
            <li><span>2. Адрес</span></li>
            <li><span>3. Доставка</span></li>
            <li><span>4. Оплата</span></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <table class="table table-bordered">
            <tr class="cart_prod_head">
              <td class="img_cart">Товар</td>
              <td class="title_cart">Описание</td>
              <td class="price_cart">Цена за единицу</td>
              <td class="value_cart">Кол-во</td>
              <td class="rez_price_cart">Стоимость</td>
            </tr>
            <tr class="cart_prod_content">
              <td class="img_cart"><img src="images/prod1.jpg"></td>
              <td class="title_cart">Рюкзак туристический</td>
              <td class="price_cart">3500 руб</td>
              <td class="value_cart">
                <div>
                  <input type="text" value="1">
                  <span>-</span>
                  <span>+</span>
                </div>
              </td>
              <td class="rez_price_cart">3500 руб</td>
            </tr>
            <tr class="cart_prod_footer">
              <td colspan="2" class="null_cart"></td>
              <td colspan="2" class="rez_title_cart">Итого, к оплате:</td>
              <td class="rez_price_cart">3500 руб</td>
            </tr>
          </table>
          </div>
          <div class="col-lg-12 btn_cart_wrap">
            <a href="#" class="btn_cart_im"><i class="glyphicon glyphicon-chevron-left"></i>Продолжить покупки</a>
            <a href="#" class="btn_cart_zakaz">Оформить заказ<i class="glyphicon glyphicon-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
    </form>

    <div class="container-fluid write_email_and_sseti">
      <div class="container">
        <div class="row write_email_and_sseti_wrap">
          <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 write_email">
            <p>Рассылка</p>
              <form>
              <button type="submit">
                      <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
              <input type="text" placeholder="Введите E-mail">
              </form>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs sseti_wrap">
            <div>
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-vk"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
