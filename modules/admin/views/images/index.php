<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Картинки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить картинку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'prod_id',
                'value' => 'prod.name',
            ],
            'file',
            [
            'attribute' => 'file',
            'label' => 'Картинка',
            'format' => 'html',
            'value' => function($model) {
                return Html::img('/web/images/' . $model->file, [
                            'width' => '50px', 'style' => 'max-width:100%'
                ]);
            }
            ],
            'ord',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
