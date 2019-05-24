<?php

/* @var $this yii\web\View */
/* @var $model1 app\models\Categories */
/* @var $model2 app\models\Categories */

//$this->title = 'Главная';
?>
<div class="site-index">
    <div class="container ban_block_wrap">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block ban1">
          <div>
              <img src="/images/<?=$model1->img?>" class="title_img" alt="model1">
            <a href="/items/category?id=<?=$model1->id?>">
              <h2><?=$model1->name?></h2>
              <?=$model1->description?>
              <span>Подробнее</span>
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block">
          <div>
            <img src="/images/<?=$model2->img?>"  class="title_img" alt="model2">
            <a href="/items/category?id=<?=$model2->id?>">
              <h2><?=$model2->name?></h2>
              <?=$model2->description?>
              <span>Подробнее</span>
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
