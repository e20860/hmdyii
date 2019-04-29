<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $images app\modules\admin\models\Images */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <?php  if(!$model->isNewRecord): ?>
    <hr>
    <p class="h1 text-center">Фотографии данного товара</p>
    <hr>
    <div class="row">
        <div class="col-sm-6 text-right">
            Загрузить новое фото в список
        </div>
        <div class="col-sm-6">
            <form>
                <div class="form-group">
                    <input id="idmodel" type="hidden" name="idmodel"  value="<?= $model->id; ?>">  
                    <input type="file" class="form-control-file" id="imgFile">
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
            <?php
            Pjax::begin();
            echo GridView::widget([
                'dataProvider' => $images,
                'columns' => [
                    'id',
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
                    [
                        'attribute' => 'id',
                        'label' => 'Действие',
                        'format' => 'html',
                        'value' => function($img) {
                            return Html::a('x', '/admin/products/delpic?id='
                                            . $img->id.'&prod='.$img->prod_id , [
                                        'class' => 'btn btn-danger btn-sm',
                            ]);
                        }
                    ]
                ],
            ]);
            Pjax::end();
            ?>
    </div>

<?php
$script = "
    $('#imgFile').on('change',function(e){
        var idmodel = $('#idmodel').val();
        var file_data = $('#imgFile').prop('files')[0];
        var formData = new FormData();
        formData.append('imgFile', file_data);
        formData.append('idmodel', idmodel);
        $.ajax({
            type: 'post',
            url:'/admin/products/uploadpic',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                 console.log(data);
            },
            error: function(e){
                console.log(e);
            }
        })  
        e.preventDefault();
         
        return false;
    });     
";
$this->registerJs($script);
?>
<?php endif;?>
</div>
