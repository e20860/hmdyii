<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Принятые заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'user_id',
            [
                'attribute' => 'created_at',
                'label' => 'Дата создания',
                'format' => ['date','php:d.m.Y'],
            ],
            //'created_at',
            //'updated_at',
            'name',
            'email:email',
            //'phone',
            //'address',
            [
                'attribute' => 'status',
                'value' => 'ostatus.name'
            ],
            [
                'attribute' => 'delivery',
                'value' => function ($data){
                    return !$data->delivery ? 'не доставлен':'доставлен';
                },
                //'contentOptions' => ['class' => 'text-primary'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                
                ],
        ],
    ]); ?>


</div>
