<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 20:32
 */

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
  public function actionIndex($name) {
    $product = new Product();
    $product = $product->getOneProduct($name);
    return $this->render('index', compact('product'));
  }

}