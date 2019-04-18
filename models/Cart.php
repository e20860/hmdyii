<?php

namespace app\models;

use yii\db\ActiveRecord;


/**
 * Description of Cart
 *
 * @author admin
 */
class Cart extends ActiveRecord{
    
    public function addToCart($product, $qty = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $img = $product->images[0]->file;
            if(empty($img)){
                $img = 'gag.jpeg';
            }
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])?
                $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])?
                $_SESSION['cart.sum'] + $qty * $product->price : $qty* $product->price;
                
    } //addToCart
    
    /**
     * Удаляет позицию из корзины
     * @param type $id
     * @return boolean
     */
     public function removeItem($id)
     {
        if(!isset($_SESSION['cart'][$id])) return false;
        unset($_SESSION['cart'][$id]);
        $qq = 0;
        $ss = 0;
        foreach ($_SESSION['cart'] as $id=>$item){
            $qq += $item['qty'];
            $ss += $item['price'] * $item['qty'];
        }
        $_SESSION['cart.qty'] = $qq;
        $_SESSION['cart.sum'] = $ss;
     }
} // Class
