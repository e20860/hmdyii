<?php

/* @var $this yii\web\View */
/* @var $model Object */
$this->title = 'Список товаров';
?>
<div class="container">
        <div class="row">
		    <div class="col-lg-12 contant_wrap">
		    	<div class="navigation">
		    		<ul>
		    			<li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
		    			<li><span><?= $model->name;?></span></li>
		    		</ul>
		    	</div>
		    </div>
    	</div>
    	<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
                <div class="short_description">
                    <div class="row">
                        <h2><?= $model->name;?></h2>
                    </div>
                    <div class="row">
                        <img class="img-responsive" src="/images/<?= $model->img;?>">
                    </div>
                    <div class="row">
                        <p><?= $model->description;?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row content">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1><?= $model->name;?></h1>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                      <p>В наличии: <?=count($model->products);?></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                    <form action="#">
                      <p><strong>Сортировка по:</strong>
                        <select name="sortirovka_prod">
                          <option selected="selected">--</option>
                          <option value="0">Цене, по возрастанию</option>
                          <option value="1">Цене, по убыванию</option>
                          <option value="2">Названию товара, от А до Я</option>
                          <option value="3">Названию товара, от Я до А</option>
                         </select>
                      </p>
                      <p><strong>Показать:</strong>
                        <select name="/number_prod_str">
                          <option selected="selected">12</option>
                          <option value="0">24</option>
                          <option value="1">48</option>
                         </select>
                      </p>
                      <button type="submit">Применить</button>
                    </form>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                    <p><strong>Вид:</strong>
                        <?php
                            $class1 = ' active';
                            $class2 = '';
                            if($view == 1){
                                $class1 = '';
                                $class2 = ' active';
                            }
                        ?>
                      <a href="/items/category?id=<?= $model->id;?>&view=0">
                          <i class="glyphicon glyphicon-th <?= $class1;?>"></i>
                          <span>Сетка</span>
                      </a>
                      <a href="/items/category?id=<?= $model->id;?>&view=1">
                          <i class="glyphicon glyphicon-th-list <?= $class2;?>"></i>
                          <span>Список</span>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <?php  if(isset($products)): ?>
              <?php foreach ($products as $product): ?>
              <?php 
                if (isset($product->images)){
                  $img = $product->images[0]->file;
              } else {
                  $img = 'gag.jpeg';
              } 
              ?> 
                <?php 
                    $class_view = $view==0?'col-lg-4 col-md-6 col-sm-4 col-xs-12':
                                  'col-lg-12 col-md-12 col-sm-12 col-xs-12 view_list';
                ?>    
                <div class="<?= $class_view?>">
                <!-- -->    
                  <div class="product">
                    <a href="/items/prod?id=<?=$product->id;?>" class="product_img">
                      <span>-10%</span>
                      <img  src="/images/<?=$img;?>">
                    </a>
                    <a href="/items/prod?id=<?=$product->id;?>" class="product_title"><?=$product->name;?></a>
                    <div class="product_price">
                      <span class="price"><?=$product->price;?> руб</span>
                      <span class="price_old"><?=$product->old_price;?></span>
                    </div>
                    <div class="product_btn">
                      <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                      <a href="#" class="mylist">Список желаний</a>
                    </div>
                  </div>
                </div>
              <?php endforeach;?>        
              <?php endif;?>
              <?php      
              /* шаблон записи
              <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                <div class="product">
                  <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="/images/hrs_01.png">
                  </a>
                  <a href="#" class="product_title">Конь в пальто</a>
                  <div class="product_price">
                    <span class="price">3500 руб</span>
                    <span class="price_old">3700 руб</span>
                  </div>
                  <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                  </div>
                </div>
              </div>
               */
              ?>      
          </div>
        </div>
    	</div>
    </div>

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
