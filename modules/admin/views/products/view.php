<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены в необходимости удаления данного товара?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cat_id',
            'name',
            'price',
            'old_price',
            'keywords',
            'description:ntext',
        ],
    ]) ?>
    <hr>
    <p class="h2 text-center">Фотографии, относящиеся к данному товару</p>
    <hr>
    <div class="row">
        <?php 
            echo GridView::widget([
                'dataProvider' => $images,
                'columns' => [
                  'ord',
                  'file',
                   [
                      'attribute' => 'file',
                      'label' => 'Картинка',
                      'format' => 'html',
                      'value' => function($model) {
                        return Html::img('/web/images/' . $model->file,[
                            'width' => '70px', 'style' => 'max-width:100%'
                            ]);
                      }
                   ],
                           
                ],
            ]);
        ?>
    </div>

</div>
