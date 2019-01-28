<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 20:18
 */

namespace app\models;


use yii\db\ActiveRecord;
use Yii;

class Product extends ActiveRecord
{
  public static function tableName()
  {
    return 'product';
  }

  public function getAllProducts() {
    $products = Yii::$app->cache->get('products');
    if (!$products) {
      $sql = 'SELECT * FROM jewelry.product ORDER BY id DESC LIMIT 1, 10';
      $products = Product::findbysql($sql)->all();
      //$products = Product::find()->asArray()->all();
      Yii::$app->cache->set('products', $products, 10);
    };
    return $products;
  }

  public function getProductsCategories($id) {
    $catProducts = Yii::$app->cache->get('catProducts');
    if (!$catProducts) {
      $catProducts = Product::find()->where(['category' => $id])->asArray()->all();
    };
    return $catProducts;
  }

  public function getOneProduct($name) {
    return Product::find()->where(['link'=>$name])->one();
  }

  public function getSearchResults($search) {
    $searchResults = Product::find()->where(['like', 'name', $search])->asArray()->all();
    return $searchResults;
  }
}