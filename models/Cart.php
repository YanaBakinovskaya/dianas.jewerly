<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 23:07
 */

namespace app\models;

use app\models\Order;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
  public function addToCart($product) {

    if (isset($_SESSION['cart'][$product->id])) {
      $_SESSION['cart'][$product->id]['goodQuantity'] +=1;
    } else {
      $_SESSION['cart'][$product->id] = [
        'goodQuantity' => 1,
        'name' => $product['name'],
        'price' => $product['price'],
        'descr' => $product['descr'],
        'img' => $product['img'],
        'link' => $product['link'],
      ];
    }

    $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity'] + 1 : 1;
    $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum'] + $product->price : $product->price;
  }
  public function recalcCart($id) {
    $quantity = $_SESSION['cart'][$id]['goodQuantity'];
    $price = $_SESSION['cart'][$id]['price'] * $quantity;
    $_SESSION['cart.totalQuantity'] -= $quantity;
    $_SESSION['cart.totalSum'] -= $price;
    unset($_SESSION['cart'][$id]);
  }
}

