<?php
    if(empty($session['cart'])){
        echo '<h3>Корзина пуста</h3>';
        return false;
    }
?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item):?>
            <tr>
                <td><?= yii\helpers\Html::img("/images/{$item['img']}", [
                    'alt' => $item['name'],
                    'height' => 30,
                ]) ?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['qty']?></td>
                <td><?=$item['price']?></td>
                <td><span class="glyphicon glyphicon-remove text-danger del-item" 
                     aria-hidden="true" data-id="<?= $id; ?>"></span></td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="4">Итого, единиц:</td>
                <td id="cqty"><?=$session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">Сумма:</td>
                <td><?=$session['cart.sum']?></td>
            </tr>
        </tbody>
    </table>
</div>

