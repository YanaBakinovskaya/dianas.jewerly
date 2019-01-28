<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 20:14
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
  public static function tableName()
  {
    return 'category';
  }

  public function getCategories()
  {
    return Category::find()->asArray()->all();
  }
}

