<?php

/* @var $this yii\web\View */
/* @var $model object  */
/* @var $images array */
/* @var $category object */
/* @var $reviews array */

$imgCnt = count($images);

//$this->title = 'Карточка изделия';
?>
<div class="container items-prod">
    <div class="row">
        <div class="col-lg-12 contant_wrap">
            <div class="navigation">
                <ul>
                    <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="/items/category?id=<?=$category->id?>"><?=$category->name?></a></li>
                    <li><span><?=$model->name?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="row content page_prod">
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="img_prod">
                <img src="/images/<?=$images[0]->file?>" class=" img-responsive">
            </div>
          </div>
          <div class="col-lg-6 col-md-9 col-sm-8 col-xs-12">
            <div class="content_prod">
              <h1><?=$model->name?></h1>
              <p><span>Артикул:</span> MYDOLL01</p>
              <p>В наличии</p>
              <p><?=$model->description?></p>
              <br>
              <div class="row">
              <?php if($imgCnt > 1):?>
                <?php foreach($images as $img): ?>
                    <div class="col-sm-2">
                        <img src="/images/<?=$img->file;?>" class=" img-responsive img-prod">
                    </div>
                <?php endforeach;?>
              <?php endif;?>
              </div>    
            </div>
          </div>
          <div class="col-lg-3 col-md-8 col-sm-7 col-sm-offset--5 col-xs-12">
            <div class="order_prod">
                <p class="price_prod"><?=$model->price?></p>
                <p class="price_old_prod"><?=$model->old_price?></p>
                <p>Количество:</p>
                <form>
                    <input type="text" name="quantity" id="quantity" value="1" class="input_text">
                    <button id="minus">-</button>
                    <button id="plus">+</button>
                </form>
                <a href="#" class="add_cart_prod cart" data-id="<?=$model->id?>">
                    <i class="glyphicon glyphicon-shopping-cart"></i> В корзину
                </a>
                <a href="#" class="add_mylist_prod">
                    <i class="glyphicon glyphicon-heart"></i>В список желаний
                </a>
            </div>
          </div>

          <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <div class="r_prod">
                
            <?php if(count($reviews) > 0):?>    
              <h3>Отзывы:</h3>
              <?php foreach ($reviews as $reviw): ?>
              <div class="reviews">
                <div class="reviews_img">
                  <img src="/images/avatar.png">
                </div>
                <div class="reviews_contant">
                  <p class="reviews_title"><?= $review->user->name;?> 
                      <span><?=$review->r_date;?></span></p>
                  <div class="reviews_rating">
                    <?php for($i=1;$i<6;$i++):?>  
                        <i class="glyphicon glyphicon-star <?=$review->rating>$i ? '' : ' active';?>"></i>
                    <?php endfor;?>
                  </div>
                  <p class="reviews_text"><?= $review->text;?></p>
                </div>
              </div>
              <?php endforeach;?>
            <?php endif; ?>  
              <hr>
              <div class="reviews_form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <p>Отзыв о товаре:</p>
                </div>
                  <form id="review_form">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" placeholder="Имя">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="email" placeholder="E-mail">
                  </div>
                  <div class="col-lg-12">
                    <textarea name="text" placeholder="Отзыв"></textarea>
                  </div>
                    <div class="col-lg-12 reviews_rating">
                    <i class="glyphicon glyphicon-star rs active" data="1"></i>
                    <i class="glyphicon glyphicon-star rs" data="2"></i>
                    <i class="glyphicon glyphicon-star rs" data="3"></i>
                    <i class="glyphicon glyphicon-star rs" data="4"></i>
                    <i class="glyphicon glyphicon-star rs" data="5"></i>
                  </div>
                    <input type="hidden" name="rating"  id="rating" value="1"> 
                  <div class="col-lg-12">
                      <button id="review_btn">Добавить</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

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