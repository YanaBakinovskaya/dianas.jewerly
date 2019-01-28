<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 17:40
 */

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;
use Yii;

class CategoryController extends Controller
{
  public function actionIndex() {
    $products = new Product();
    $products = $products->getAllProducts();
    return $this->render('index', compact('products'));
  }

  public function actionView($id) {
    $products = new Product();
    $products = $products->getProductsCategories($id);
    return $this->render('view', compact('products'));
  }


}