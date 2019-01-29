<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 27.01.2019
 * Time: 23:18
 */

namespace app\models;


use Yii;

class Order extends \yii\db\ActiveRecord
{

//  public $name;
//  public $email;
//  public $phone;
//  public $address;
  //public $sum;

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
      'name' => 'name',
      'email' => 'email',
      'phone' => 'phone',
      'address' => 'address',
    ];
  }
}