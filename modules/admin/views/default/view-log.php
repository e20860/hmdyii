<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $provider  ArrayDataProvider */
/* @var $dataArray Array */
/* @var $columns   Array */


?>
<div class="ret-data">
    <?php
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $provider,
        'columns' => $columns,
    ]);
    Pjax::end();
    ?>
</div>
