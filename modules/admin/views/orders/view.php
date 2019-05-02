<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$ordQty = 0;
$ordSum = 0;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Править данные', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить заказ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены в необходимости удаления заказа?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'created_at',
            'updated_at',
            'name',
            'email:email',
            'phone',
            'address',
            [
                'attribute' => 'status',
                'value' => $model->ostatus->name,
            ],
            [
                'attribute' => 'delivery',
                'value' => function ($data){
                    return !$data->delivery ? 'не доставлен':'доставлен';
               }
            ],
        ],
    ]) ?>
    <hr>
    <h2>Содержание заказа</h2>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->ordItems as $item): ?>
                <tr>
                    <td><?=$item->name?></td>
                    <td><?=$item->quantity?></td>
                    <td><?=$item->price?></td>
                </tr>
                <?php
                    $ordSum += ($item->quantity * $item->price);
                    $ordQty += ($item->quantity);
                ?>
                <?php endforeach;?>
                <tr>
                    <td colspan="2">Итого, единиц:</td>
                    <td><?=$ordQty?></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Сумма:</strong></td>
                    <td><strong><?=$ordSum?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    
</div>
