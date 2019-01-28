<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 27.01.2019
 * Time: 23:18
 */

namespace app\models;


use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
  public static function tableName()
  {
    return 'order';
  }
  public function rules()
  {
    return [
      [['name', 'email', 'phone', 'address', 'sum'], 'required'],
      [['email'], 'email'],
      [['name', 'email'], 'string', 'max' => 150],
      [['phone', 'status'], 'string', 'max' => 100],
      [['address'], 'string', 'max' => 250],
    ];
  }

  public function attributeLabels()
  {
    return [
      'name' => 'Имя',
      'email' => 'E-mail',
      'phone' => 'Телефон',
      'address' => 'Адрес',
    ];
  }
}