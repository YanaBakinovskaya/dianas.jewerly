<?php
/**
 * Created by PhpStorm.
 * User: Yana_nout
 * Date: 26.01.2019
 * Time: 23:05
 */

namespace app\controllers;
use app\models\Cart;
use app\models\Product;
use app\models\Order;
use yii\helpers\Url;
use yii\helpers\Html;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{

  public function actionIndex()
  {
    $session = Yii::$app->session;
    $session->open();
    $order = new Order();
    if ($order->load(Yii::$app->request->post())) {
        
      $order->date = date('Y-m-d H:i:s');
      $order->sum = $session['cart.totalSum'];
    
      if ($order->save()) {
        
        $currentID = $order->id;
        $sum = $order->sum;
        $name = $order->name;
        $address = $order->address;
        $phone = $order->phone;
        $email = $order->email;
         Yii::$app->mailer->compose()
          ->setFrom('yana_nik@ukr.net')
          ->setTo('yananik3@gmail.com')
          ->setSubject('Ваш заказ принят, через 5 мин наш менеджер Вам перезвонит')
          ->send();
        return $this->render('success', compact('session', 'currentID', 'sum', 'address', 'phone', 'name', 'email'));
      }
    //   if (!$session['cart.totalSum']) {
    //   return Yii::$app->response->redirect(Url::to('/'));
    //   die();
    //   }
      
    }
    return $this->render('index', compact('session', 'order'));
  }

  public function actionDelete($id) {
    $session = Yii::$app->session;
    $session->open();
    if (!$session['cart.totalSum']) {
      return Yii::$app->response->redirect(Url::to('/'));
      die();
    }
    $cart = new Cart();
    $cart->recalcCart($id);
    $order = new Order();
    if ($order->load(Yii::$app->request->post())) {
      $order->date = date('Y-m-d H:i:s');
      $order->sum = $session['cart.totalSum'];
      if ($order->save()) {
        $currentID = $order->id;
        $sum = $order->sum;
        $name = $order->name;
        $address = $order->address;
        $phone = $order->phone;
        $email = $order->email;
        Yii::$app->mailer->compose()
          ->setFrom('yana_nik@ukr.net')
          ->setTo('yananik3@gmail.com')
          ->setSubject('Ваш заказ принят, через 5 мин наш менеджер Вам перезвонит')
          ->send();
        return $this->render('success', compact('session', 'currentID', 'sum', 'address', 'phone', 'name', 'email'));
      }
    }
    $this->layout = 'empty-layout';
    return $this->renderPartial('index', compact('session', 'id', 'order'));
  }
  public function actionAdd($name) {
    $product = new Product();
    $product = $product->getOneProduct($name);
    $session = Yii::$app->session;
    $session->open();
    $cart = new Cart();
    $cart->addToCart($product);
    return true;
  }



}