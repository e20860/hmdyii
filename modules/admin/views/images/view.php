<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Images */

$this->title = $model->file;
$this->params['breadcrumbs'][] = ['label' => 'Картинки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены в необходимости удаления?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'prod_id',
                'value' => function($model){
                    return $model->prod->name;
                },
            ],
            
            'file',
            [
            'attribute' => 'file',
            'label' => 'Картинка',
            'format' => 'html',
            'value' => function($model) {
                return Html::img('/web/images/' . $model->file, [
                            'width' => '150px', 'style' => 'max-width:100%'
                ]);
            }
            ],
            
            'ord',
        ],
    ]) ?>

</div>
